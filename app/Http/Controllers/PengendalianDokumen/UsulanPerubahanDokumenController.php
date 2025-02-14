<?php

namespace App\Http\Controllers\PengendalianDokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsulanPerubahanDokumenController extends Controller
{
    public function index(Request $request){
        return view('01.06_usulan_perubahan_dokumen', [
            'pageName' => '01.06 Usulan Perubahan Dokumen'
        ]);
    }
}
