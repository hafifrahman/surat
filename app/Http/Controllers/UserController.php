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
        $search = $request->input('search');
        return view('admin.users.index', [
            'roles' => Role::all(),
            'users' => User::with('roles')->search($search)->paginate(3),
        ]);
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
        User::create($request->all());
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
        $data = $request->all();
        if (!$request->filled('password')) {
            unset($data['password']);
        }
        $user->update($data);
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
