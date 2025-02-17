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
        Schema::create('detail_daftar_dokumen_eksternals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form');
            $table->date('tanggal');
            $table->string('no_dokumen');
            $table->string('nama_dokumen');
            $table->string('klasifikasi_dokumen');
            $table->string('penerbit_dokumen');
            $table->year('tahun_terbit_dokumen');
            $table->string('status_digunakan');
            $table->string('keterangan');

            $table->foreign('id_form', 'id_form')->references('id')->on('form_daftar_dokumen_eksternals')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_daftar_dokumen_eksternals');
    }
};
