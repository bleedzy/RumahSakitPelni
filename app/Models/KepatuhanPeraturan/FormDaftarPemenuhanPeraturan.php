<?php

namespace App\Models\KepatuhanPeraturan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDaftarPemenuhanPeraturan extends Model
{
        /** @use HasFactory<\Database\Factories\KepatuhanPeraturan\FormDaftarPeraturanKeamananInformasiFactory> */
        use HasFactory;
        protected $table = 'form_daftar_pemenuhan_peraturans';
    
        protected $fillable = [
            'no_rekaman',
            'nama_head_of_legal',
            'nama_vice_presiden',
            'is_signed',
            'signed_at',
            'document_scan'
        ];
    
        protected $casts = [
            'is_signed' => 'boolean',
            'signed_at' => 'datetime',
        ];
    
        // Accessor untuk memastikan nilai dikembalikan sebagai boolean
        public function getIsSignedAttribute($value) {
            return (bool) $value;
        }
    
        // Mutator untuk memastikan nilai yang disimpan adalah 0 atau 1
        public function setIsSignedAttribute($value) {
            $this->attributes['is_signed'] = $value ? 1 : 0;
        }
}
