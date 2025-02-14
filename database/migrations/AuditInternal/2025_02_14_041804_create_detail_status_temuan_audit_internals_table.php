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
        Schema::create('detail_status_temuan_audit_internals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form')->constrained('form_status_temuan_audit_internals');
            $table->date('tanggal');
            $table->string('no_rekaman_ptka');
            $table->text('uraian_ketidak_sesuaian_audit');
            $table->string('pasal');
            $table->enum('status', ['major', 'minor', 'rekomendasi']);
            $table->date('tanggal_target_selesai');
            $table->text('analisa_penyebab');
            $table->text('koreksi_pada_saat_kejadian');
            $table->text('tindakan_koreksi_total');
            $table->date('tanggal_verifikasi');
            $table->date('tanggal_efektif');
            $table->date('tanggal_terbuka');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_status_temuan_audit_internals');
    }
};
