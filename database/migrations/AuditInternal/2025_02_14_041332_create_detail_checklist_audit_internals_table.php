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
        Schema::create('detail_checklist_audit_internals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form')->constrained('form_checklist_audit_internals');
            $table->string('uraian_pertanyaan');
            $table->enum('temuan', [1, 2, 3, 4]);
            $table->string('catatan_auditor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_checklist_audit_internals');
    }
};
