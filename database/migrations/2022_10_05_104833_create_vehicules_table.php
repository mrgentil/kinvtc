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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('modele');
            $table->string('luggage')->nullable();
            $table->integer('door')->nullable();
            $table->string('fuel_type')->nullable();
            $table->integer('engine')->nullable();
            $table->string('mileage')->nullable();
            $table->string('transmission')->nullable();
            $table->string('drive')->nullable();
            $table->string('fuel_economy')->nullable();
            $table->string('exterior_color')->nullable();
            $table->string('interior_color')->nullable();
            $table->string('bluetooth')->nullable();
            $table->string('multimedia_player')->nullable();
            $table->string('central_lock')->nullable();
            $table->string('sunroof')->nullable();
            $table->integer('annee_fabrication')->nullable();
            $table->integer('capacite_passagers')->nullable();
            $table->string('image_cover');
            $table->string('image_slider1');
            $table->string('image_slider2');
            $table->string('image_slider3');
            $table->string('image_slider4');
            $table->enum('type_reservation', ['Journalière', 'Transport Aeroport']);
            $table->unsignedBigInteger('type_vehicule_id');
            $table->foreign('type_vehicule_id')->references('id')->on('type_vehicules');
            $table->boolean('disponibilite')->default(true);
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
