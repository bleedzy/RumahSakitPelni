<?php

namespace App\Http\Controllers\PengendalianDokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemusnahanDokumenRekamanController extends Controller
{
    public function index(Request $request){
        return view('01.07_pemusnahan_dokumen_rekaman', [
            'pageName' => '01.07 Pemusnahan Dokumen-Rekaman'
        ]);
    }
}
