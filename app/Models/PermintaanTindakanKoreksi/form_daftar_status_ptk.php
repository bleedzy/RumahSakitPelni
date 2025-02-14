<?php

namespace App\Models\PermintaanTindakanKoreksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_daftar_status_ptk extends Model
{
    use HasFactory;

    protected $table = 'form_daftar_status_ptks';

    protected $fillable = [
        'no_rekaman_dokumen',
        'nama_ciso',
        'nama_vice_president',
        'is_signed',
        'signed_at',
        'document_scan',
        'created_by'
    ];
}
