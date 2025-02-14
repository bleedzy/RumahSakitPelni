<?php

namespace App\Http\Controllers\PengendalianDokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SerahterimaDokumenRekamanController extends Controller
{
    public function index(Request $request){
        return view('01.05_serah_terima_dokumen_rekaman',[
            'pageName' => '01.05 Serah Terima Dokumen-Rekaman'
        ]);
    }
}
