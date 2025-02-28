<?php

namespace App\Models\PengendalianDokumen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDaftarDokumenEksternal extends Model
{
    /** @use HasFactory<\Database\Factories\PengendalianDokumen\DetailDaftarDokumenEksternalFactory> */
    use HasFactory;

    protected $fillable = [
        'id_form',
        'tanggal',
        'no_dokumen',
        'nama_dokumen',
        'klasifikasi_dokumen',
        'penerbit_dokumen',
        'tahun_terbit',
        'status_digunakan',
        'keterangan'
    ];

    public $timestamps = false;
}
