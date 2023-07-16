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
        Schema::create('master_programs', function (Blueprint $table) {
            $table->id('id_programs');
            $table->string('gambar_programs');
            $table->string('icon_programs');
            $table->string('nama_programs');
            $table->string('konten_programs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_programs');
    }
};
