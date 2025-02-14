<?php

namespace App\Models\PermintaanTindakanKoreksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_penyelesaian_ptk_bermasalah extends Model
{
    use HasFactory;

    protected $table = 'detail_penyelesaian_ptk_bermasalah';

    protected $fillable = [
        'id_form',
        'no_rekaman_ptk',
        'tanggal_ptk',
        'keterangan'
    ];
}
