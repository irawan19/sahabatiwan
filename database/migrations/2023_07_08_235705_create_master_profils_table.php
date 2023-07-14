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
        Schema::create('master_profils', function (Blueprint $table) {
            $table->id('id_profils');
            $table->string('foto1_profils');
            $table->string('foto2_profils');
            $table->string('foto3_profils');
            $table->string('text1_profils');
            $table->string('text2_profils');
            $table->string('nama_profils');
            $table->string('keterangan_nama_profils');
            $table->longtext('sekilas_konten_profils');
            $table->longtext('konten_profils');
            $table->string('url_youtube_profils');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_profils');
    }
};
