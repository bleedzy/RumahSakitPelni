<?php

namespace Database\Seeders\PermintaanTindakanKoreksi;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermintaanTindakanKoreksi\formPermintaanTindakanKoreksi;

class FormPermintaanTindakanKoreksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        formPermintaanTindakanKoreksi::factory()->count(20)->create();
    }
}
