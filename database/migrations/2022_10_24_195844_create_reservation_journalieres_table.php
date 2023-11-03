<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservation_journalieres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicule_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('pickup_location');
            $table->decimal('cout_total', 10, 2);
            $table->dateTime('pick_up_date');
            $table->time('pick_up_time');
            $table->dateTime('collection_date');
            $table->time('collection_time');
            $table->integer('difference_en_jours');
            $table->enum('statut', ['En Attente','Confirmee', 'Annulee', 'Terminee']);
            // Clé étrangère pour lier à la table des véhicules
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
