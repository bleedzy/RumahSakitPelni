<?php

namespace App\Http\Controllers\PengendalianDokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanPengkajianDokumenRekamanController extends Controller
{
    public function index(Request $request){
        return view('01.10_laporan_pengkajian_dokumen_rekaman', [
            'pageName' => '01.10 Laporan Pengkajian Dokumen-Rekaman'
        ]);
    }
}
