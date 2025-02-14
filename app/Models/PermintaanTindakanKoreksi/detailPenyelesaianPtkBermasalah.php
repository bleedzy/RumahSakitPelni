<?php

namespace App\Models\PermintaanTindakanKoreksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailPenyelesaianPtkBermasalah extends Model
{
    use HasFactory;

    protected $table = 'detail_penyelesaian_ptk_bermasalahs';

    protected $fillable = [
        'id_form',
        'no_rekaman_ptk',
        'tanggal_ptk',
        'keterangan'
    ];
}
