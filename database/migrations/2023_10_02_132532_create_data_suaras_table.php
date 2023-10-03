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
        Schema::create('data_suaras', function (Blueprint $table) {
            $table->id('id_data_suaras');
            $table->bigInteger('users_id')->unsigned()->index()->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('set null')->onDelete('set null');
            $table->bigInteger('kelurahans_id')->unsigned()->index()->nullable();
            $table->foreign('kelurahans_id')->references('id_kelurahans')->on('master_kelurahans')->onUpdate('set null')->onDelete('set null');
            $table->double('tahun_data_suaras');
            $table->string('nama_data_suaras');
            $table->string('tps_data_suaras');
            $table->string('rt_data_suaras');
            $table->string('rw_data_suaras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_suaras');
    }
};
