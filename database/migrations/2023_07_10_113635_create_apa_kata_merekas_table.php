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
        Schema::create('apa_kata_merekas', function (Blueprint $table) {
            $table->id('id_apa_kata_merekas');
            $table->string('nama_apa_kata_merekas');
            $table->string('profesi_apa_kata_merekas');
            $table->string('foto_apa_kata_merekas');
            $table->longText('konten_apa_kata_merekas');
            $table->boolean('status_baca_apa_kata_merekas')->default(0);
            $table->boolean('status_publikasi_apa_kata_merekas')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apa_kata_merekas');
    }
};
