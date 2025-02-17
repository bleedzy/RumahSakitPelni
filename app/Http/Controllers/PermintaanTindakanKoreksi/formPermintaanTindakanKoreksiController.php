<?php

namespace App\Http\Controllers\PermintaanTindakanKoreksi;

use App\Models\PermintaanTindakanKoreksi\formPermintaanTindakanKoreksi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class formPermintaanTindakanKoreksiController extends Controller
{
    public function index(Request $request)
    {
        $data = formPermintaanTindakanKoreksi::all();
        dd($data);
        return view('02.01_form_permintaan_tindakan_koreksi', [
            'pageName' => '02.01 Permintaan Tindakan Koreksi'
        ]);
    }
}
