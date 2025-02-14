<?php

namespace Database\Seeders;

use App\Models\PengendalianDokumen\FormDaftarDokumenEksternal;
use Database\Factories\PengendalianDokumen\FormDaftarDokumenEksternalFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaftarDokumenEksternalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormDaftarDokumenEksternalFactory::new()->count(50)->create();
    }
}
