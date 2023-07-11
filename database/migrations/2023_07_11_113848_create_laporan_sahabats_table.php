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
        Schema::create('laporan_sahabats', function (Blueprint $table) {
            $table->id('id_laporan_sahabats');
            $table->bigInteger('kelurahans_id')->unsigned()->index()->nullable();
            $table->foreign('kelurahans_id')->references('id_kelurahans')->on('master_kelurahans')->onUpdate('set null')->onDelete('set null');
            $table->string('nama_laporan_sahabat');
            $table->string('telepon_laporan_sahabats');
            $table->string('email_laporan_sahabats');
            $table->string('alamat_laporan_sahabats');
            $table->longtext('aduan_laporan_sahabats');
            $table->string('file_laporan_sahabats');
            $table->boolean('status_baca_laporan_sahabats')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_sahabats');
    }
};
