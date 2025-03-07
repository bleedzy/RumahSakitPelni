<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengendalianDokumen\DaftarDokumenEksternalController;
use App\Http\Controllers\PengendalianDokumen\LaporanPengkajianDokumenRekamanController;
use App\Http\Controllers\PengendalianDokumen\PemusnahanDokumenRekamanController;
use App\Http\Controllers\PengendalianDokumen\PerjanjianKerahasiaanController;
use App\Http\Controllers\PengendalianDokumen\SerahterimaDokumenRekamanController;
use App\Http\Controllers\PengendalianDokumen\SuratPernyataanKerahasiaanController;
use App\Http\Controllers\PengendalianDokumen\UsulanPerubahanDokumenController;
use App\Http\Controllers\KepatuhanPeraturan\FormDaftarPeraturanKeamananInformasiController;
use App\Http\Controllers\KepatuhanPeraturan\FormDaftarPemenuhanPeraturanController;
use App\Http\Controllers\KepatuhanPeraturan\FormDaftarDistribusiPeraturanController;
use App\Http\Controllers\PermintaanTindakanKoreksi\formPermintaanTindakanKoreksiController;
use App\Http\Controllers\PermintaanTindakanKoreksi\formPenyelesaianPtkBermasalahController;
use App\Http\Controllers\PermintaanTindakanKoreksi\formDaftarStatusPtkController;
use App\Http\Controllers\AuditInternal\formDaftarAuditInternalController;
use App\Http\Controllers\AuditInternal\formChecklistAuditInternalController;
use App\Http\Controllers\AuditInternal\formJadwalDetailAuditInternalController;
use App\Http\Controllers\AuditInternal\formJadwalTahunanAuditInternalController;
use App\Http\Controllers\AuditInternal\formLaporanAuditInternalController;
use App\Http\Controllers\AuditInternal\formPtkAuditInternalController;
use App\Http\Controllers\AuditInternal\formStatusTemuanAuditInternalController;
use App\Http\Controllers\ManajemenResiko\SasaranManajemenKeamananInformasi;
use App\Http\Controllers\ManajemenResiko\SasaranManajemenKeamananInformasiController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Models\KepatuhanPeraturan\FormDaftarDistribusiPeraturan;
use App\Models\KepatuhanPeraturan\FormDaftarPemenuhanPeraturan;
use App\Models\ManajemenResiko\SasaranManajemenKeamananInformasi as ManajemenResikoSasaranManajemenKeamananInformasi;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return redirect()->route('auth.login');
})->name('index');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::resource('user', UserController::class)->middleware(Authenticate::class);

// umar
Route::prefix('pengendalian_dokumen')->name('01.')->middleware(Authenticate::class)->group(function () {
    Route::resource('daftar_dokumen_eksternal', DaftarDokumenEksternalController::class, ['names' => '04']);
    Route::get('{id}/print', [DaftarDokumenEksternalController::class, 'print'])->name('04.print');
    Route::resource('serah_terima_dokumen_rekaman', SerahterimaDokumenRekamanController::class, ['names' => '05']);
    Route::resource('usulan_perubahan_dokumen', UsulanPerubahanDokumenController::class, ['names' => '06']);
    Route::resource('pemusnahan_dokumen_rekaman', PemusnahanDokumenRekamanController::class, ['names' => '07']);
    Route::resource('surat_pernyataan_kerahasiaan', SuratPernyataanKerahasiaanController::class, ['names' => '08']);
    Route::resource('perjanjian_kerahasiaan', PerjanjianKerahasiaanController::class, ['names' => '09']);
    Route::resource('laporan_pengkajian_dokumen', LaporanPengkajianDokumenRekamanController::class, ['names' => '10']);
});
// // umar

// adi
Route::prefix('permintaan_tindakan_koreksi')->name('02.')->middleware(Authenticate::class)->group(function () {
    Route::resource('permintaan_tindakan_koreksi', formPermintaanTindakanKoreksiController::class, ['names' => '01']);
    Route::resource('daftar_status_ptk', formDaftarStatusPtkController::class, ['names' => '02']);
    Route::resource('penyelesaian_ptk_bermasalah', formPenyelesaianPtkBermasalahController::class, ['names' => '03']);
});

Route::prefix('audit_internal')->name('03.')->middleware(Authenticate::class)->group(function () {
    Route::resource('daftar_audit_internal', formDaftarAuditInternalController::class, ['names' => '01']);
    Route::resource('ptk_audit_internal', formPtkAuditInternalController::class, ['names' => '02']);
    Route::resource('jadwal_tahunan_audit_internal', formJadwalTahunanAuditInternalController::class, ['names' => '03']);
    Route::resource('jadwal_detail_audit_internal', formJadwalDetailAuditInternalController::class, ['names' => '04']);
    Route::resource('checklist_audit_internal', formChecklistAuditInternalController::class, ['names' => '05']);
    Route::resource('laporan_audit_internal', formLaporanAuditInternalController::class, ['names' => '06']);
    Route::resource('status_temuan_audit_internal', formStatusTemuanAuditInternalController::class, ['names' => '07']);
});
// // adi

//juna
Route::prefix('kepatuhan_peraturan')->name('05.')->middleware(Authenticate::class)->group(function () {
    Route::resource('daftar_peraturan_keamanan_informasi', FormDaftarPeraturanKeamananInformasiController::class, ['names' => '01'])->parameter('daftar_peraturan_keamanan_informasi', 'id');
    Route::resource('daftar_pemenuhan_peraturan', FormDaftarPemenuhanPeraturanController::class, ['names' => '02']);
    Route::resource('daftar_distribusi_peraturan', FormDaftarDistribusiPeraturanController::class, ['names' => '03']);
});
// // juna
Route::prefix('manajemen_resiko')->name('06.')->middleware(Authenticate::class)->group(function () {
    // Route::resource('risk_register', RiskRegister::class, ['names' => '01']);
    Route::resource('sasaran_manajemen_keamanan_informasi', SasaranManajemenKeamananInformasiController::class, ['names' => '02']);
});
