<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'roles' => Role::get(),
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $user = $request->user()->fill($data);
        $user->save();
        return redirect()->back()->with('success', 'Profil anda telah diperbarui.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = $request->user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['hapus_password' => 'Password yang dimasukkan salah.']);
        }
        Auth::logout();
        $user->delete();
        return redirect()->to('/login');
    }
}
