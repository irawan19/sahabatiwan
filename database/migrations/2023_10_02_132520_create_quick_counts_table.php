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
        Schema::create('quick_counts', function (Blueprint $table) {
            $table->id('id_quick_counts');
            $table->bigInteger('users_id')->unsigned()->index()->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('set null')->onDelete('set null');
            $table->bigInteger('kelurahans_id')->unsigned()->index()->nullable();
            $table->foreign('kelurahans_id')->references('id_kelurahans')->on('master_kelurahans')->onUpdate('set null')->onDelete('set null');
            $table->double('tahun_quick_counts');
            $table->string('tps_quick_counts');
            $table->string('rt_quick_counts');
            $table->string('rw_quick_counts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_counts');
    }
};
