<?php

namespace App\Http\Controllers\PengendalianDokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratPernyataanKerahasiaanController extends Controller
{
    public function index(Request $request){
        return view('01.08_surat_pernyataan_kerahasiaan', [
            'pageName' => '01.08 Surat Pernyataan Kerahasiaan'
        ]);
    }
}
