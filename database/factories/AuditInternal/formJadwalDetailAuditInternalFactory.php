<?php

namespace Database\Factories\AuditInternal;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AuditInternal\formJadwalDetailAuditInternal;

class formJadwalDetailAuditInternalFactory extends Factory
{
    protected $model = formJadwalDetailAuditInternal::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_rekaman_dokumen' => $this->faker->uuid,
            'catatan' => $this->faker->text,
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
