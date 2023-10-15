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


//    public function calculateTotalAmount(): float|int
//    {
//        // Assurez-vous que le véhicule associé à la réservation existe
//        if ($this->vehicule) {
//            // Convertissez les chaînes de caractères en objets DateTime
//            $debutReservation = Carbon::parse($request->debut_reservation);
//            $finReservation = Carbon::parse($request->fin_reservation);
//
//            // Récupérez la différence entre la date de début et la date de fin
//            $diff = $debutReservation->diff($finReservation);
//
//            // Récupérez le prix du véhicule associé à la réservation
//            $prixVehicule = $this->vehicule->type->price_journalier;
//           // dd($prixVehicule);
//            // Calculez le montant total en utilisant la différence en heures
//            $diffInHours = $diff->d;
//            $montantTotal = $diffInHours * $prixVehicule;
//
//            return $montantTotal;
//
//        }
//
//        // Retournez une valeur par défaut ou une erreur, selon votre logique
//        return 0; // Vous pouvez personnaliser cela en fonction de vos besoins
//    }


}
