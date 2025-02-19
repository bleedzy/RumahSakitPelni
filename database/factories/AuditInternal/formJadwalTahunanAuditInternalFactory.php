<?php

namespace Database\Factories\AuditInternal;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AuditInternal\formJadwalTahunanAuditInternal;

class formJadwalTahunanAuditInternalFactory extends Factory
{
    protected $model = formJadwalTahunanAuditInternal::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_rekaman_dokumen' => $this->faker->uuid,
            'periode' => $this->faker->year,
            'nama_lead_auditor' => $this->faker->name,
            'nama_vice_president' => $this->faker->name,
            'is_signed' => $this->faker->boolean,
            'signed_at' => $this->faker->date,
            'document_scan' => $this->faker->word,
            'created_by' => $this->faker->randomDigitNotNull,
            'created_at' => $this->faker->dateTime,
        ];
    }
}
