<?php

namespace App\Models;

use App\Events\ReservationCreated;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'vehicule_id',
        'lieu_embarquement',
        'lieu_livraison',
        'debut_reservation',
        'fin_reservation',
        'statut',
        'montant_total',

    ];

    protected $dispatchesEvents = [
        'created' => ReservationCreated::class,
    ];


}
