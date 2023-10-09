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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('conducteur_id');
            $table->unsignedBigInteger('vehicule_id');
            $table->dateTime('debut_reservation');
            $table->dateTime('fin_reservation');
            $table->enum('statut', ['Confirmee', 'En Attente', 'Annulee', 'Terminee']);
            $table->decimal('montant_total', 10, 2);
            $table->timestamp('date_creation');
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('conducteur_id')->references('id')->on('users');
            $table->foreign('vehicule_id')->references('id')->on('vehicules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
