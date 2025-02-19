<?php

namespace Database\Factories\AuditInternal;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AuditInternal\formChecklistAuditInternal;

class formChecklistAuditInternalFactory extends Factory
{
    protected $model = formChecklistAuditInternal::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_rekaman_dokumen' => $this->faker->uuid,
            'unit_kerja' => $this->faker->company,
            'tanggal_audit' => $this->faker->date,
            'nama_auditor' => $this->faker->name,
            'nama_lead_auditor' => $this->faker->name,
            'is_signed' => $this->faker->boolean,
            'signed_at' => $this->faker->date,
            'document_scan' => $this->faker->word,
            'created_by' => $this->faker->randomDigitNotNull,
            'created_at' => $this->faker->dateTime,
        ];
    }
}
