<?php

namespace App\Models\AuditInternal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formJadwalTahunanAuditInternal extends Model
{
    use HasFactory;

    protected $table = 'form_jadwal_tahunan_audit_internal';

    protected $fillable = [
        'no_rekaman_dokumen',
        'periode',
        'nama_lead_auditor',
        'nama_vice_president',
        'is_signed',
        'signed_at',
        'document_scan',
        'created_by',
        'created_at',
    ];

    public $timestamps = false;

    protected $casts = [
        'is_signed' => 'boolean',
        'signed_at' => 'date',
        'created_at' => 'datetime',
    ];
}
