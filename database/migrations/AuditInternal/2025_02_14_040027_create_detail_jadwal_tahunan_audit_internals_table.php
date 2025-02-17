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
        Schema::create('detail_jadwal_tahunan_audit_internals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form')->constrained('form_jadwal_tahunan_audit_internals');
            $table->string('nama_kegiatan');
            $table->json('jadwal_plan_action')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_jadwal_tahunan_audit_internals');
    }
};
