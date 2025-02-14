<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('01.04_daftar_dokumen_eksternal', [
//         'pageName' => '01.04 Daftar Dokumen Eksternal'
//     ]);
// });
Route::get('', function () {
    return redirect()->route('auth.login');
})->name('index');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('user')->name('user.')->middleware(Authenticate::class)->group(function () {
    Route::get('', [UserController::class, 'index'])->name('index');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
});

Route::prefix('pengendalian_dokumen')->name('01')->middleware(Authenticate::class)->group(function () {
    Route::prefix('daftar_dokumen_eksternal')->name('.04')->group(function () {
        Route::get('/', function () {
            return view('01.04_daftar_dokumen_eksternal', [
                'pageName' => '01.04 Daftar Dokumen Eksternal'
            ]);
        })->name('.index');
    });
    Route::prefix('serah_terima_dokumen_rekaman')->name('.05')->group(function () {
        Route::get('/', function () {
            return view('01.05_serah_terima_dokumen_rekaman', [
                'pageName' => '01.05 Serah Terima Dokumen-Rekaman'
            ]);
        })->name('.index');
    });
    Route::prefix('usulan_perubahan_dokumen')->name('.06')->group(function () {
        Route::get('/', function () {
            return view('01.06_usulan_perubahan_dokumen', [
                'pageName' => '01.06 Usulan Perubahan Dokumen'
            ]);
        })->name('.index');
    });
    Route::prefix('pemusnahan_dokumen_rekaman')->name('.07')->group(function () {
        Route::get('/', function () {
            return view('01.07_pemusnahan_dokumen_rekaman', [
                'pageName' => '01.07 Pemusnahan Dokumen-Rekaman'
            ]);
        })->name('.index');
    });
    Route::prefix('surat_pernyataan_kerahasiaan')->name('.08')->group(function () {
        Route::get('/', function () {
            return view('01.08_surat_pernyataan_kerahasiaan', [
                'pageName' => '01.08 Surat Pernyataan Kerahasiaan'
            ]);
        })->name('.index');
    });
    Route::prefix('perjanjian_kerahasiaan')->name('.09')->group(function () {
        Route::get('/', function () {
            return view('01.09_perjanjian_kerahasiaan', [
                'pageName' => '01.09 Perjanjian Kerahasiaan'
            ]);
        })->name('.index');
    });
    Route::prefix('laporan_pengkajian_dokumen_rekaman')->name('.10')->group(function () {
        Route::get('/', function () {
            return view('01.10_laporan_pengkajian_dokumen_rekaman', [
                'pageName' => '01.10 Laporan Pengkajian Dokumen-Rekaman'
            ]);
        })->name('.index');
    });
});

Route::prefix('permintaan_tindakan_koreksi')->name('02')->middleware(Authenticate::class)->group(function () {
    Route::prefix('form_permintaan_tindakan_koreksi')->name('.01')->group(function () {
        Route::get('/', function () {
            return view('02.01_form_permintaan_tindakan_koreksi', [
                'pageName' => '02.01 Permintaan Tindakan Koreksi'
            ]);
        })->name('.index');
    });
    Route::prefix('form_daftar_status_ptk')->name('.02')->group(function () {
        Route::get('/', function () {
            return view('02.02_form_daftar_status_ptk', [
                'pageName' => '02.02 Daftar Status PTK'
            ]);
        })->name('.index');
    });
    Route::prefix('form_penyelesaian_ptk_bermasalah')->name('.03')->group(function () {
        Route::get('/', function () {
            return view('02.03_form_penyelesaian_ptk_bermasalah', [
                'pageName' => '02.03 Penyelesaian PTK Bermasalah'
            ]);
        })->name('.index');
    });
});

Route::prefix('audit_internal')->name('03')->middleware(Authenticate::class)->group(function () {
    Route::prefix('form_daftar_audit_internal')->name('.01')->group(function () {
        Route::get('/', function () {
            return view('03.01_form_daftar_audit_internal', [
                'pageName' => '03.01 Daftar Audit Internal'
            ]);
        })->name('.index');
    });
    Route::prefix('form_ptk_audit_internal')->name('.02')->group(function () {
        Route::get('/', function () {
            return view('03.02_form_ptk_audit_internal', [
                'pageName' => '03.02 PTK Audit Internal'
            ]);
        })->name('.index');
    });
    Route::prefix('form_jadwal_tahunan_audit_internal')->name('.03')->group(function () {
        Route::get('/', function () {
            return view('03.03_form_jadwal_tahunan_audit_internal', [
                'pageName' => '03.03 Jadwal Tahunan Audit Internal'
            ]);
        })->name('.index');
    });
    Route::prefix('form_jadwal_detail_audit_internal')->name('.04')->group(function () {
        Route::get('/', function () {
            return view('03.04_form_jadwal_detail_audit_internal', [
                'pageName' => '03.04 Jadwal Detail Audit Internal'
            ]);
        })->name('.index');
    });
    Route::prefix('form_checklist_audit_internal')->name('.05')->group(function () {
        Route::get('/', function () {
            return view('03.05_form_checklist_audit_internal', [
                'pageName' => '03.05 Checklist Audit Internal'
            ]);
        })->name('.index');
    });
    Route::prefix('form_laporan_audit_internal')->name('.06')->group(function () {
        Route::get('/', function () {
            return view('03.06_form_laporan_audit_internal', [
                'pageName' => '03.06 Laporan Audit Internal'
            ]);
        })->name('.index');
    });
    Route::prefix('form_status_temuan_audit_internal')->name('.07')->group(function () {
        Route::get('/', function () {
            return view('03.07_form_status_temuan_audit_internal', [
                'pageName' => '03.07 Status Temuan Audit Internal'
            ]);
        })->name('.index');
    });
});