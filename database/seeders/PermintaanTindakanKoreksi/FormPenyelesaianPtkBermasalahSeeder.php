<?php

namespace Database\Seeders\PermintaanTindakanKoreksi;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermintaanTindakanKoreksi\formPenyelesaianPtkBermasalah;
class FormPenyelesaianPtkBermasalahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        formPenyelesaianPtkBermasalah::factory()->count(20)->create();
    }
}
