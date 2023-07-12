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
        Schema::create('master_swara_nusvantaras', function (Blueprint $table) {
            $table->id('id_swara_nusvantaras');
            $table->bigInteger('kategori_swara_nusvantaras_id')->unsigned()->index()->nullable();
            $table->foreign('kategori_swara_nusvantaras_id')->references('id_kategori_swara_nusvantaras')->on('master_kategori_swara_nusvantaras')->onUpdate('set null')->onDelete('set null');
            $table->string('gambar_swara_nusvantaras');
            $table->string('judul_swara_nusvantaras');
            $table->longtext('konten_swara_nusvantaras');
            $table->datetime('tanggal_publikasi_swara_nusvantaras');
            $table->double('total_baca_swara_nusvantaras');
            $table->double('total_komentas_swara_nusvantaras');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_swara_nusvantaras');
    }
};
