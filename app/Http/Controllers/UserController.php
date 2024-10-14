<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('q');
        $roles = Role::all();
        $users = User::with('roles')->search($search)->paginate(2);
        return view('admin.users.index', compact('users', 'roles', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'role_id' => ['required', 'exists:roles,id_role'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        User::create($validated);
        return redirect('/admin/users')->with('success', 'Pengguna baru ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$user->id"],
            'role_id' => ['required', 'exists:roles,id_role'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);
        if (!$request->filled('password')) unset($validated['password']);
        $user->update($validated);
        return redirect('/admin/users')->with('success', 'Pengguna telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/users')->with('danger', 'Pengguna telah dihapus');
    }

    public function pdf()
    {
        $pdf = Pdf::loadView('admin.users.export.pdf', [
            'users' => User::all()
        ]);
        return $pdf->stream('pengguna.pdf');
    }

    public function excel()
    {
        return Excel::download(new UsersExport, 'pengguna.xlsx');
    }
}
