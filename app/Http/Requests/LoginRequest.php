<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'lowercase', 'string', 'exists:users,email'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate()
    {
        $credentials = $this->validated();
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !password_verify($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'password' => [__('auth.password')],
            ]);
        }
        auth()->login($user);
    }
}
