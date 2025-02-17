<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_daftar_peraturan_keamanan_informasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form')->constrained('form_daftar_peraturan_keamanan_informasis')->onDelete('cascade');
            $table->string('nama_peraturan');
            $table->string('judul_peraturan');
            $table->year('tahun_terbit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_daftar_peraturan_keamanan_informasis');
    }
};
