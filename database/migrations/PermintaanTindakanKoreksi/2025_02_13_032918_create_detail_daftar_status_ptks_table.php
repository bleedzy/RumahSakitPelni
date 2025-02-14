<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detail_daftar_status_ptks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id');
            $table->foreign('form_id')->references('id')->on('form_daftar_status_ptks')->onDelete('cascade');
            $table->integer('no_rekaman_ptk');
            $table->string('keterangan_ptk');
            $table->string('pic');
            $table->date('tanggal_mulai');
            $table->date('tanggal_target_selesai');
            $table->date('tanggal_selesai')->nullable();
            $table->string('hasil')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_daftar_status_ptks');
    }
};
