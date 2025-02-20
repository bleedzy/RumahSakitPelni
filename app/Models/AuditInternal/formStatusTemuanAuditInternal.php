<?php

namespace App\Models\AuditInternal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class formStatusTemuanAuditInternal extends Model
{
    use HasFactory;

    protected $table = 'form_status_temuan_audit_internals';

    protected $fillable = [
        'no_rekaman_dokumen',
        'kesimpulan',
        'jumlah_temuan',
        'jumlah_selesai',
        'nama_lead_auditor',
        'nama_vice_president',
        'signed_at',
        'document_scan',
        'created_by',
        'created_at',
    ];

    public $timestamps = false;

    protected $casts = [
        'signed_at' => 'date',
        'created_at' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
