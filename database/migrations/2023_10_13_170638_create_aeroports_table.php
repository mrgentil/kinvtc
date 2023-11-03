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
        Schema::create('aeroports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dropoffLocation');
            $table->string('exterior_color')->nullable();
            $table->string('interior_color')->nullable();
            $table->string('image_cover')->nullable();
            $table->string('image_slider1');
            $table->string('image_slider2');
            $table->string('image_slider3');
            $table->string('image_slider4');
            $table->integer('capacite_passagers')->nullable();
            $table->string('kilometrage')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->boolean('disponibilite')->default(true);
            $table->string('slug')->unique();
            $table->unsignedBigInteger('commune_id');
            $table->foreign('commune_id')->references('id')->on('communes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aeroports');
    }
};
