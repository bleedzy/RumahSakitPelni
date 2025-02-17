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
        Schema::create('detail_daftar_pemenuhan_peraturans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form')->constrained('form_daftar_pemenuhan_peraturans')->onDelete('cascade');
            $table->string('nama_peraturan');
            $table->string('tentang')->nullable();
            $table->string('status')->nullable();
            $table->string('kondisi_aktual')->nullable();
            $table->string('aspek_keamanan')->nullable();
            $table->string('tindakan_koreksi')->nullable();
            $table->string('pic')->nullable();
            $table->date('batas_waktu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_daftar_pemenuhan_peraturans');
    }
};
