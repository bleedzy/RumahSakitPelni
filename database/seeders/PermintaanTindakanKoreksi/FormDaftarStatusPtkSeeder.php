<?php

namespace Database\Seeders\PermintaanTindakanKoreksi;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermintaanTindakanKoreksi\formDaftarStatusPtk;
class FormDaftarStatusPtkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        formDaftarStatusPtk::factory()->count(20)->create();
    }
}
