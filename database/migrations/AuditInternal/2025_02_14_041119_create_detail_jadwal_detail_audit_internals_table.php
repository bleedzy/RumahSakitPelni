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
        Schema::create('detail_jadwal_detail_audit_internals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form')->constrained('form_jadwal_detail_audit_internals');
            $table->timestamp('waktu');
            $table->string('unit_kerja');
            $table->string('pic');
            $table->string('proses_yang_diaudit');
            $table->string('auditor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_jadwal_detail_audit_internals');
    }
};
