<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

Route::get('/users/export/pdf', [UserController::class, 'pdf']);
Route::get('/users/export/excel', [UserController::class, 'excel']);

Route::get('/agenda/export/pdf', [AgendaController::class, 'pdf']);

Route::get('/arsip/export/pdf', [ArsipController::class, 'pdf']);
Route::get('/arsip/download/{file}', [ArsipController::class, 'download'])->name('arsip.download');

Route::get('/laporan-sm', [SuratMasukController::class, 'report'])->name('laporan-sm');
Route::get('/laporan-sm/report', [SuratMasukController::class, 'export'])->name('laporan-sm.report');
Route::get('/surat-masuk/download/{file}', [SuratMasukController::class, 'download'])->name('surat-masuk.download');
Route::get('/surat-masuk/export/pdf', [SuratMasukController::class, 'pdf']);

Route::get('/laporan-sk', [SuratKeluarController::class, 'report'])->name('laporan-sk');
Route::get('/laporan-sk/report', [SuratKeluarController::class, 'export'])->name('laporan-sk.report');
Route::get('/surat-keluar/export/pdf', [SuratKeluarController::class, 'pdf']);
Route::get('/surat-keluar/download/{file}', [SuratKeluarController::class, 'download'])->name('surat-keluar.download');
