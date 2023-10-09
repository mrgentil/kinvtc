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
        Schema::create('type_vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price_journalier', 10, 2)->nullable();
            $table->decimal('price_aerot', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_vehicules');
    }
};
