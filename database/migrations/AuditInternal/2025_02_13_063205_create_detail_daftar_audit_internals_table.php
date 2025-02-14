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
        Schema::create('detail_daftar_audit_internals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form')->constrained('form_daftar_audit_internals');
            $table->string('nama');
            $table->string('unit_kerja');
            $table->boolean('sertifikat_pelatihan')->default(false);
            $table->string('tempat_pelatihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_daftar_audit_internals');
    }
};
