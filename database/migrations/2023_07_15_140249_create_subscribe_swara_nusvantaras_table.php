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
        Schema::create('subscribe_swara_nusvantaras', function (Blueprint $table) {
            $table->id('id_subscribes');
            $table->bigInteger('subscribes_id')->unsigned()->index()->nullable();
            $table->foreign('subscribes_id')->references('id_subscribes')->on('master_subscribes')->onUpdate('set null')->onDelete('set null');
            $table->bigInteger('swara_nusvantaras_id')->unsigned()->index()->nullable();
            $table->foreign('swara_nusvantaras_id')->references('id_swara_nusvantaras')->on('master_swara_nusvantaras')->onUpdate('set null')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribe_swara_nusvantaras');
    }
};
