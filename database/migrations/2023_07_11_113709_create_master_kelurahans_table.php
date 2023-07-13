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
        Schema::create('master_kelurahans', function (Blueprint $table) {
            $table->id('id_kelurahans');
            $table->bigInteger('kecamatans_id')->unsigned()->index()->nullable();
            $table->foreign('kecamatans_id')->references('id_kecamatans')->on('master_kecamatans')->onUpdate('set null')->onDelete('set null');
            $table->string('nama_kelurahans');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_kelurahans');
    }
};
