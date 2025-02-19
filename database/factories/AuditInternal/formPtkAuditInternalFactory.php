<?php

namespace Database\Factories\AuditInternal;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AuditInternal\formPtkAuditInternal;

class formPtkAuditInternalFactory extends Factory
{
    protected $model = formPtkAuditInternal::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_rekaman_ptk' => $this->faker->uuid,
            'unit_kerja' => $this->faker->company,
            'tanggal_audit' => $this->faker->date,
            'nama_auditor' => $this->faker->name,
            'nama_auditee' => $this->faker->name,
            'nama_lead_auditor' => $this->faker->name,
            'rincian_temuan' => $this->faker->text,
            'referensi' => $this->faker->text,
            'pasal' => $this->faker->word,
            'tingkat_ketidaksesuaian' => $this->faker->randomElement(['major', 'minor', 'rekomendasi']),
            'tanggal_batas_penyelesaian' => $this->faker->date,
            'identifikasi_penyebab' => $this->faker->text,
            'koreksi_pada_saat_kejadian' => $this->faker->text,
            'tindakan_koreksi_total' => $this->faker->text,
            'tanggal_penyelesaian' => $this->faker->date,
            'verifikasi_tindakan_perbaikan' => $this->faker->text,
            'keputusan' => $this->faker->boolean,
            'no_ptk_baru' => $this->faker->word,
            'nama_verifier' => $this->faker->name,
            'tanggal_verifikasi' => $this->faker->date,
            'is_signed' => $this->faker->boolean,
            'signed_at' => $this->faker->date,
            'document_scan' => $this->faker->word,
            'created_by' => $this->faker->randomDigitNotNull,
            'created_at' => $this->faker->dateTime,
        ];
    }
}
