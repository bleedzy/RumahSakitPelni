<?php

namespace App\Models\PermintaanTindakanKoreksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_daftar_status_ptk extends Model
{
    use HasFactory;

    protected $table = 'detail_daftar_status_ptks';

    protected $fillable = [
        'id_form',
        'no_rekaman_ptk',
        'keterangan_ptk',
        'pic',
        'tanggal_mulai',
        'tanggal_target_selesai',
        'tanggal_selesai',
        'hasil'
    ];
}
