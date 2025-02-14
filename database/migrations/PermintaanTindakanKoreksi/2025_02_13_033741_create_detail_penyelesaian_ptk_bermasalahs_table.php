<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detail_penyelesaian_ptk_bermasalahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form')->constrained('form_penyelesaian_ptk_bermasalahs');
            $table->string('no_rekaman_ptk')->unique();
            $table->date('tanggal_ptk');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_penyelesaian_ptk_bermasalahs');
    }
};
