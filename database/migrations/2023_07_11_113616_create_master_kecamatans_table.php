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
        Schema::create('master_kecamatans', function (Blueprint $table) {
            $table->id('id_kecamatans');
            $table->bigInteger('kota_kabupatens_id')->unsigned()->index()->nullable();
            $table->foreign('kota_kabupatens_id')->references('id_kota_kabupatens')->on('master_kota_kabupatens')->onUpdate('set null')->onDelete('set null');
            $table->string('nama_kecamatans');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_kecamatans');
    }
};
