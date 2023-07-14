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
        Schema::create('komentar_swara_nusvantaras', function (Blueprint $table) {
            $table->id('id_komentar_swara_nusvantaras');
            $table->bigInteger('swara_nusvantaras_id')->unsigned()->index()->nullable();
            $table->foreign('swara_nusvantaras_id')->references('id_swara_nusvantaras')->on('master_swara_nusvantaras')->onUpdate('set null')->onDelete('set null');
            $table->string('nama_komentar_swara_nusvantaras');
            $table->string('email_komentar_swara_nusvantaras');
            $table->longtext('konten_deskripsi_swara_nusvantaras');
            $table->boolean('statu_baca_komentar_swara_nusvantaras')->default(0);
            $table->boolean('status_publikasi_komentar_swara_nusvantaras')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar_swara_nusvantaras');
    }
};
