<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengendalianDokumen\DaftarDokumenEksternalController;
use App\Http\Controllers\PengendalianDokumen\LaporanPengkajianDokumenRekamanController;
use App\Http\Controllers\PengendalianDokumen\PemusnahanDokumenRekamanController;
use App\Http\Controllers\PengendalianDokumen\PerjanjianKerahasiaanController;
use App\Http\Controllers\PengendalianDokumen\SerahterimaDokumenRekamanController;
use App\Http\Controllers\PengendalianDokumen\SuratPernyataanKerahasiaanController;
use App\Http\Controllers\PengendalianDokumen\UsulanPerubahanDokumenController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return redirect()->route('auth.login');
})->name('index');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::resource('user', UserController::class)->middleware(Authenticate::class);

Route::prefix('pengendalian_dokumen')->name('01.')->middleware(Authenticate::class)->group(function () {
    Route::resource('daftar_dokumen_eksternal', DaftarDokumenEksternalController::class, ['names' => '04']);
    Route::resource('serah_terima_dokumen_rekaman', SerahterimaDokumenRekamanController::class, ['names' => '05']);
    Route::resource('usulan_perubahan_dokumen', UsulanPerubahanDokumenController::class, ['names' => '06']);
    Route::resource('pemusnahan_dokumen_rekaman', PemusnahanDokumenRekamanController::class, ['names' => '07']);
    Route::resource('surat_pernyataan_kerahasiaan', SuratPernyataanKerahasiaanController::class, ['names' => '08']);
    Route::resource('perjanjian_kerahasiaan', PerjanjianKerahasiaanController::class, ['names' => '09']);
    Route::resource('laporan_pengkajian_dokumen_rekaman', LaporanPengkajianDokumenRekamanController::class, ['names' => '10']);
});