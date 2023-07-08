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
        Schema::create('master_slideshows', function (Blueprint $table) {
            $table->id('id_slideshows');
            $table->string('text1_slideshows');
            $table->longtext('text2_slideshows');
            $table->string('gambar_slideshows');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_slideshows');
    }
};
