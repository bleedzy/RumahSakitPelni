<?php

namespace App\Http\Controllers\PengendalianDokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerjanjianKerahasiaanController extends Controller
{
    public function index(Request $request){
        return view('01.09_perjanjian_kerahasiaan', [
            'pageName' => '01.09 Perjanjian Kerahasiaan'
        ]);
    }
}
