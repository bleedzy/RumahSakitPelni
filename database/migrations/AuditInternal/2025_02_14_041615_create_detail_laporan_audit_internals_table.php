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
        Schema::create('detail_laporan_audit_internals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form')->constrained('form_laporan_audit_internals');
            $table->string('unit_kerja');
            $table->enum('jenis_temuan', ['major', 'minor', 'rekomendasi']);
            $table->integer('total');
            $table->boolean('is_done')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_laporan_audit_internals');
    }
};
