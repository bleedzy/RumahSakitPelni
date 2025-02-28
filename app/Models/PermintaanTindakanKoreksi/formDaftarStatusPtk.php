<?php

namespace App\Models\PermintaanTindakanKoreksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class formDaftarStatusPtk extends Model
{
    use HasFactory;

    protected $table = 'form_daftar_status_ptks';

    protected $fillable = [
        'no_rekaman_dokumen',
        'nama_ciso',
        'nama_vice_president',
        'signed_at',
        'document_scan',
        'created_by'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
