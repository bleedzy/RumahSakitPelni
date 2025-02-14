<?php

namespace App\Models\PengendalianDokumen;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDaftarDokumenEksternal extends Model
{
    /** @use HasFactory<\Database\Factories\PengendalianDokumen\DaftarDokumenEksternalFactory> */
    use HasFactory;

    public function createdBy () {
        return $this->belongsTo(User::class, 'created_by');
    }
}
