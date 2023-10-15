<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmation;
use App\Models\Reservation;
use App\Models\TypeVehicule;
use App\Models\Vehicule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // Validez les données du formulaire (ajoutez des règles de validation appropriées ici)
        $request->validate([
            'debut_reservation' => 'required',
            'fin_reservation' => 'required|after_or_equal:debut_reservation',
            'lieu_embarquement' => 'required',
            'lieu_livraison' => 'required',
            'vehicule_id' => 'required',
        ]);

        // Vérifiez si l'utilisateur est connecté
        if (auth()->check()) {
            // L'utilisateur est connecté

            // Convertissez les dates de début et de fin en objets Carbon
            $debutReservation = Carbon::parse($request->debut_reservation);
            $finReservation = Carbon::parse($request->fin_reservation);
            // Calculez la différence en nombre de jours
            $differenceEnJours = $debutReservation->diffInDays($finReservation);
            if ($differenceEnJours === 0) {
                $differenceEnJours = 1;
            }

            // Récupérez le prix du véhicule associé
            $vehiculeId = $request->vehicule_id;
            $vehicule = Vehicule::find($vehiculeId);
            $prixVehicule = $vehicule->type->price_journalier;

            // Calculez le montant total
            $montantTotal = $differenceEnJours * $prixVehicule;

            // Créez une nouvelle réservation
            $reservation = new Reservation();

            $reservation->client_id = auth()->id(); // Vous devez gérer l'authentification de l'utilisateur
            Mail::to(auth()->user()->email)->send(new ReservationConfirmation($reservation));
            $reservation->debut_reservation = $debutReservation;
            $reservation->fin_reservation = $finReservation;
            $reservation->lieu_embarquement = $request->lieu_embarquement;
            $reservation->lieu_livraison = $request->lieu_livraison;
            $reservation->vehicule_id = $vehiculeId; // Associez le véhicule choisi
            $reservation->montant_total = $montantTotal;
            $reservation->statut = 'En attente';

            // Enregistrez la réservation
            $reservation->save();

           // Alert::success('Réservation réussie', 'Votre réservation a été enregistrée avec succès!')->persistent(true, true);


            // Redirigez l'utilisateur vers une page de confirmation
            return redirect()->back()->with('message', 'Votre réservation a été enregistrée avec succès!');
        } else {
            // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour effectuer une réservation.');
        }
    }
}
