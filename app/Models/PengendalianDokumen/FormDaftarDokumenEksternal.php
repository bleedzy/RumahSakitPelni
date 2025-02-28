<?php

namespace App\Models\PengendalianDokumen;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDaftarDokumenEksternal extends Model
{
    /** @use HasFactory<\Database\Factories\PengendalianDokumen\DaftarDokumenEksternalFactory> */
    use HasFactory;

    protected $fillable = [
        'no_rekaman_dokumen',
        'nama_divisi',
        'nama_document_control',
        'nama_vice_president',
        'created_by'
    ];

    public function createdBy () {
        return $this->belongsTo(User::class, 'created_by');
    }
}
