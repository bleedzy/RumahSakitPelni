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
        Schema::create('detail_daftar_distribusi_peraturans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form')->constrained('form_daftar_distribusi_peraturans')->onDelete('cascade');
            $table->string('no_peraturan');
            $table->string('judul_peraturan');
            $table->string('unit_kerja');
            $table->date('tanggal_menerima')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_daftar_distribusi_peraturans');
    }
};
