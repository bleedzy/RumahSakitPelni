<?php

namespace Database\Seeders\PermintaanTindakanKoreksi;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermintaanTindakanKoreksi\detailPenyelesaianPtkBermasalah;
class DetailPenyelesaianPtkBermasalahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        detailPenyelesaianPtkBermasalah::factory()->count(20)->create();
    }
}
