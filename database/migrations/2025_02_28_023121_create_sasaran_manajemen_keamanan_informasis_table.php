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
        Schema::create('sasaran_manajemen_keamanan_informasis', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan');
            $table->string('sasaran');
            $table->string('sumber_data');
            $table->string('frekuensi_pemantauan_sasaran');
            $table->string('penanggung_jawab');
            $table->string('pic_monitoring');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasaran_manajemen_keamanan_informasis');
    }
};
