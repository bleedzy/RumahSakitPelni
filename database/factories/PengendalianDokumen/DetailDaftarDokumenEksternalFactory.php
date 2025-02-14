<?php

namespace Database\Factories\PengendalianDokumen;

use App\Models\PengendalianDokumen\FormDaftarDokumenEksternal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengendalianDokumen\DetailDaftarDokumenEksternal>
 */
class DetailDaftarDokumenEksternalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal'=> date('Ymd'),
            'no_dokumen' => fake()->regexify('[0-9]{2}') . '.' . fake()->regexify('[0-9]{2}'),
            'nama_dokumen' => fake()->words(3, true),
            'klasifikasi_dokumen' => fake()->word(),
            'penerbit_dokumen' => fake()->name(),
            'tahun_terbit_dokumen' => fake()->year(),
            'status_digunakan' => 'digunakan',
            'keterangan' => fake()->text(200)
        ];
    }
}
