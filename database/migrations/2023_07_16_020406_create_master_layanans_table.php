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
        Schema::create('master_layanans', function (Blueprint $table) {
            $table->id('id_layanans');
            $table->string('foto_layanans');
            $table->string('icon_layanans');
            $table->string('nama_layanans');
            $table->string('konten_layanans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_layanans');
    }
};
