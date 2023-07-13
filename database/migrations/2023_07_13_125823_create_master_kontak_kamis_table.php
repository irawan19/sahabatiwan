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
        Schema::create('master_kontak_kamis', function (Blueprint $table) {
            $table->id('id_kontak_kamis');
            $table->string('gambar_kontak_kamis');
            $table->string('text1_kontak_kamis');
            $table->string('text2_kontak_kamis');
            $table->longtext('konten_kontak_kamis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_kontak_kamis');
    }
};
