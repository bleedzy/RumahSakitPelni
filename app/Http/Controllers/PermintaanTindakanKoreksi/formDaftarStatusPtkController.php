<?php

namespace App\Http\Controllers\PermintaanTindakanKoreksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class formDaftarStatusPtkController extends Controller
{
    public function index()
    {
        return view('02.02_form_daftar_status_ptk', [
            'pageName' => '02.02 Daftar Status PTK'
        ]);
    }
}
