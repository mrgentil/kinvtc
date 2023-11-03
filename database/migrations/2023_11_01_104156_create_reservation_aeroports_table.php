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
        Schema::create('reservation_aeroports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicule_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->string('dropoffLocation');
            $table->decimal('cout_total', 10, 2)->nullable();
            $table->dateTime('pickUpDate');
            $table->time('pickUpTime');
            $table->dateTime('collection_date')->nullable();
            $table->time('collection_time')->nullable();
            $table->enum('statut', ['En Attente','Confirmee', 'Annulee', 'Terminee']);
            // Clé étrangère pour lier à la table des véhicules
            $table->foreign('vehicule_id')->references('id')->on('aeroports')->onDelete('cascade');
            $table->foreign('commune_id')->references('id')->on('communes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservation_aeroports', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['vehicule_id']);
            $table->dropColumn('vehicule_id');
            $table->dropForeign(['commune_id']);
            $table->dropColumn('commune_id');
        });
    }
};
