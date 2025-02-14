<?php

namespace Database\Seeders\PermintaanTindakanKoreksi;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermintaanTindakanKoreksi\detailDaftarStatusPtk;
class DetailDaftarStatusPtkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        detailDaftarStatusPtk::factory()->count(20)->create();
    }
}
