<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return User::all();
    // }

    public function view(): View
    {
        return view('admin.users.export.excel', [
            'users' => User::all()
        ]);
    }
}
