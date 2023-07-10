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
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id('id_testimonis');
            $table->string('nama_testimonis');
            $table->string('profesi_testimonis');
            $table->string('foto_testimonis');
            $table->longText('konten_testimonis');
            $table->boolean('status_baca_testimonis')->default(0);
            $table->boolean('status_publikasi_testimonis')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonis');
    }
};
