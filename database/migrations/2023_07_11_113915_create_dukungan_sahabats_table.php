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
        Schema::create('dukungan_sahabats', function (Blueprint $table) {
            $table->id('id_dukungan_sahabats');
            $table->bigInteger('kelurahans_id')->unsigned()->index()->nullable();
            $table->foreign('kelurahans_id')->references('id_kelurahans')->on('master_kelurahans')->onUpdate('set null')->onDelete('set null');
            $table->string('tanggal_lahir_dukungan_sahabats');
            $table->string('jenis_kelamin_dukungan_sahabats');
            $table->string('ktp_dukungan_sahabats');
            $table->string('nama_dukungan_sahabats');
            $table->string('nik_dukungan_sahabats');
            $table->string('telepon_dukungan_sahabats');
            $table->longtext('alamat_dukungan_sahabats');
            $table->boolean('status_baca_dukungan_sahabats')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dukungan_sahabats');
    }
};
