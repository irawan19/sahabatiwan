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
        Schema::create('master_kota_kabupatens', function (Blueprint $table) {
            $table->id('id_kota_kabupatens');
            $table->bigInteger('provinsis_id')->unsigned()->index()->nullable();
            $table->foreign('provinsis_id')->references('id_provinsis')->on('master_provinsis')->onUpdate('set null')->onDelete('set null');
            $table->string('nama_kota_kabupatens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_kota_kabupatens');
    }
};
