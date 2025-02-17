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
        Schema::create('form_daftar_peraturan_keamanan_informasis', function (Blueprint $table) {
            $table->id();
            $table->string('no_rekaman_dokumen')->unique('no_rekaman_dokumen');
            $table->string('nama_head_of_legal')->nullable();
            $table->string('nama_vice_president')->nullable();
            $table->boolean('is_signed')->default(false);
            $table->date('signed_at')->nullable();
            $table->string('document_scan')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_daftar_peraturan_keamanan_informasis');
    }
};
