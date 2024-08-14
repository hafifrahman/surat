<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Auth\Notifications\ResetPassword;

class AuthController extends Controller
{
    public function loginform()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();
        return redirect(currentRole() . '/dashboard');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role_id' => 2,
        ]);

        Auth::login($user);

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
            'password_confirmation' => ['required', 'same:password', 'min:8'],
        ]);

        $request->user()->update($validated);

        return redirect()->back();
    }

    public function forgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = app('auth.password.broker')->createToken($user);

            $user->notify(new ResetPasswordNotification($token));

            return back()->with('status', __('passwords.sent'));
        }

        return back()->withErrors(['email' => __('passwords.throttled')]);
    }

    public function resetPasswordForm(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __('passwords.reset'));
        }

        return back()->withErrors(['email' => __('passwords.throttled')]);
    }
}
