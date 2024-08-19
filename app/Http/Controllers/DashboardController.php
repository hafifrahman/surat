<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Agenda;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $data = [
            'agendaCount' => Agenda::count(),
            'arsipCount' => Arsip::count(),
            'suratMasukCount' => SuratMasuk::count(),
            'suratKeluarCount' => SuratKeluar::count(),
        ];
        return view('admin.dashboard', compact('data'));
    }
}
