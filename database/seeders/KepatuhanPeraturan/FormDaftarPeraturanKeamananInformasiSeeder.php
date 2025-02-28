<?php

namespace Database\Seeders\KepatuhanPeraturan;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FormDaftarPeraturanKeamananInformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('form_daftar_peraturan_keamanan_informasi')->insert([
            [
                'no_rekaman_dokumen' => 'DOC-001',
                'nama_head_of_legal' => 'John Doe',
                'nama_vice_president' => 'Jane Smith',
                'is_signed' => 1,
                'signed_at' => Carbon::now(),
                'document_scan' => 'scan1.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'no_rekaman_dokumen' => 'DOC-002',
                'nama_head_of_legal' => 'Michael Brown',
                'nama_vice_president' => 'Sarah Johnson',
                'is_signed' => 0,
                'signed_at' => null,
                'document_scan' => 'scan2.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
