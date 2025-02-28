<?php

namespace App\Models\PermintaanTindakanKoreksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class formPenyelesaianPtkBermasalah extends Model
{
    use HasFactory;

    protected $table = 'form_penyelesaian_ptk_bermasalahs';

    protected $fillable = [
        'no_rekaman_dokumen',
        'detail_kejadian_kasus',
        'detail_penyelesaian_kasus',
        'nama_ciso',
        'nama_direktur_utama',
        'signed_at',
        'document_scan',
        'created_by'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
