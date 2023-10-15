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
        Schema::create('vehicule_aeroports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('drive')->nullable();
            $table->string('exterior_color')->nullable();
            $table->string('interior_color')->nullable();
            $table->string('bluetooth')->nullable();
            $table->string('multimedia_player')->nullable();
            $table->string('central_lock')->nullable();
            $table->string('sunroof')->nullable();
            $table->integer('capacite_passagers')->nullable();
            $table->string('image_cover');
            $table->string('image_slider1');
            $table->string('image_slider2');
            $table->string('image_slider3');
            $table->string('image_slider4');
            $table->unsignedBigInteger('type_vehicule_id');
            $table->foreign('type_vehicule_id')->references('id')->on('type_vehicules');
            $table->unsignedBigInteger('commune_id');
            $table->foreign('commune_id')->references('id')->on('communes');
            $table->boolean('disponibilite')->default(true);
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicule_aeroports');
    }
};
