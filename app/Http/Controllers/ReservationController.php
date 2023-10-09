<?php

namespace App\Http\Controllers;

use App\Models\TypeVehicule;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function daily()
    {
        // Récupérez tous les véhicules dont le type de réservation est "Journalière"
        $vehiculesJournalieres = Vehicule::where('type_reservation', 'Journalière')->paginate(9);
        $typesDeVehicules = TypeVehicule::all();
        return view('reservations.journalier',compact('vehiculesJournalieres','typesDeVehicules'));
    }

    public function transport()
    {
        // Récupérez tous les véhicules dont le type de réservation est "Transport Aeroport"
        $vehiculesTransport = Vehicule::where('type_reservation', 'Transport Aeroport')->paginate(9);
        $typesDeVehicules = TypeVehicule::all();
        return view('reservations.transport',compact('vehiculesTransport','typesDeVehicules'));
    }
}
