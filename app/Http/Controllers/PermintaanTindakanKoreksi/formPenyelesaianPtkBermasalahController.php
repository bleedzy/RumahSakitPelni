<?php

namespace App\Http\Controllers\PermintaanTindakanKoreksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class formPenyelesaianPtkBermasalahController extends Controller
{
    public function index()
    {
        return view('02.03_form_penyelesaian_ptk_bermasalah', [
            'pageName' => '02.03 Penyelesaian PTK Bermasalah'
        ]);
    }
}
