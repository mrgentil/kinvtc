<?php

namespace App\Http\Controllers;

use App\Mail\ReservationAeroportConfirmation;
use App\Models\Aeroport;
use App\Models\Commune;
use App\Models\ReservationAeroport;
use App\Models\User;
use App\Models\Vehicule;
use App\Models\VehiculeAeroport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AeroportController extends Controller
{
    public function index()
    {
        $communes = Commune::all();
        $defaultDropoffLocation = Aeroport::pluck('dropoffLocation')->first();
        return view('aeroport.index', compact('communes','defaultDropoffLocation'));
    }

    public function create()
    {
        $communes = Commune::all();
        return view('aeroport.create', compact('communes'));
    }

    public function aeroport(Request $request)
    {
        // Récupérer les valeurs des champs du formulaire, y compris la case à cocher Aller/Retour
        $communeId = $request->input('commune_id');
        $dropoffLocation = $request->input('dropoffLocation');
        $pickUpDate = $request->input('PickUpDate');
        $pickUpTime = $request->input('PickUpTime');
        $collectionDate = $request->input('collectionDate');
        $collectionTime = $request->input('Collection_Time');
        $roundTrip = $request->has('roundTrip');// Vérifiez si la case Aller/Retour est cochée


        $commune = Commune::find($communeId);
        $allCommunes = Commune::all();

        if ($commune) {
            $communeName = $commune->name;
            // Maintenant, pour récupérer les véhicules aéroports liés à cette commune
            $vehiculesAeroport = $commune->aeroport;

            return view('aeroport.resultats', [
                'communeId' => $communeId,
                'dropoffLocation' => $dropoffLocation,
                'pickUpDate' => $pickUpDate,
                'pickUpTime' => $pickUpTime,
                'collectionDate' => $collectionDate,
                'Collection_Time' => $collectionTime,
                'roundTrip' => $roundTrip, // Ajoutez roundTrip à la vue
                'communeName' => $communeName,
                'allCommunes' => $allCommunes,
                'vehiculesAeroport' => $vehiculesAeroport,
            ]);
        } else {
            $communeName = "Commune inconnue"; // Gérez le cas où la commune n'est pas trouvée
            return view('aeroport.resultats', [
                'communeId' => $communeId,
                'dropoffLocation' => $dropoffLocation,
                'pickUpDate' => $pickUpDate,
                'pickUpTime' => $pickUpTime,
                'collectionDate' => $collectionDate,
                'Collection_Time' => $collectionTime,
                'roundTrip' => $roundTrip, // Ajoutez roundTrip à la vue
                'communeName' => $communeName,
                'allCommunes' => $allCommunes,
            ]);
        }
    }


    function getCommuneNames($communeIds)
    {
        $communeNames = Commune::whereIn('id', $communeIds)->pluck('name')->toArray();
        return implode(', ', $communeNames);
    }

    public function getSelectedCommune(Request $request)
    {
        // Utilisez la session pour obtenir la commune précédemment choisie
        return $request->session()->get('selectedCommune');
    }

    public function show($id, Request $request)
    {
        $vehicule = Aeroport::find($id);
        $commune = $request->input('commune_id');
        $dropoffLocation = $request->input('dropoffLocation');
        $pickUpDate = $request->input('pickUpDate');
        $pickUpTime = $request->input('pickUpTime');
        $prix = $request->input('price');
        $roundTrip = $request->has('roundTrip');

        return view('aeroport.show', compact('vehicule', 'commune', 'dropoffLocation', 'pickUpDate', 'pickUpTime', 'prix', 'roundTrip'));
    }


    public function reservationAeroportFirst(Request $request)
    {
        $communeName = $request->query('commune'); // Utilisez la variable commune
        $vehiculeName = $request->query('vehiculeName');
        $dropoffLocation = $request->query('dropoffLocation');
        $prix = $request->query('price');
        $pickUpDate = $request->query('pickUpDate');
        $pickUpTime = $request->query('pickUpTime');

        // Récupérez le véhicule complet en fonction de son nom
        $vehicule = Aeroport::where('name', $vehiculeName)->first();

        $roundTrip = true;
        // Vous pouvez maintenant utiliser les détails du véhicule et de la commune dans votre vue
        return view('aeroport.reservationFirst', compact('communeName', 'dropoffLocation', 'prix', 'pickUpDate', 'pickUpTime', 'vehicule','roundTrip'));
    }

    public function processReservationConnected(Request $request)
    {
        // Vérifiez si l'utilisateur est authentifié
        if (Auth::check()) {
            $user = Auth::user();
            // Créez une nouvelle instance de réservation
            $reservation = new ReservationAeroport();

            // Remplissez les champs de réservation avec les données du formulaire
            $reservation->vehicule_id = $request->input('vehiculeId');
            $communeName = $request->input('commune'); // Utilisez la variable commune
            $commune = Commune::where('name', $communeName)->first();
            // Récupérez l'état du checkbox "aller/retour" du formulaire
            $roundTrip = $request->has('aller_retour');
            if ($commune) {
                $communeId = $commune->id;
            } else {
                // Gérez le cas où la commune n'a pas été trouvée (par exemple, en redirigeant l'utilisateur ou en affichant un message d'erreur).
                // Vous pouvez également ajouter un return pour sortir de la fonction.
                return redirect()->route('aeroport');
            }

            $reservation->commune_id = $communeId;
            // Enregistrez la valeur dans la réservation
            $reservation->aller_retour = $roundTrip;
            $reservation->dropoffLocation = $request->input('dropoffLocation');
            $reservation->cout_total = $request->input('coutTotal');
            $reservation->pickUpDate = Carbon::parse($request->input('pickUpDate'));
            $reservation->pickUpTime = $request->input('pickUpTime');
            // Associez la réservation à l'utilisateur connecté
            $reservation->user_id = $user->id;
            // Enregistrez la réservation
            $reservation->save();
            // Chargez la relation 'vehicule' avec la réservation
            $reservation->load('vehicule');
            Mail::to($user->email)->send(new ReservationAeroportConfirmation($reservation));
            Alert::success('Succès!', 'Votre réservation a été enregistrée avec succès! , Un mail est envoyé à votre compte');
            // Redirigez l'utilisateur vers la page de confirmation avec l'ID de réservation
            return redirect()->route('aeroport-confirmation-reservation', ['reservationId' => $reservation->id]);

        } else {
            // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
            return redirect()->route('login');
        }
    }

    public function processReservationGuest(Request $request)
    {


        // Créez un nouvel utilisateur avec les informations du formulaire
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->message = $request->input('message');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $reservation = new ReservationAeroport();

        // Remplissez les champs de réservation avec les données du formulaire
        $reservation->vehicule_id = $request->input('vehiculeId');
        $communeName = $request->input('commune'); // Utilisez la variable commune
        $commune = Commune::where('name', $communeName)->first();

        // Récupérez l'état du checkbox "aller/retour" du formulaire
        $roundTrip = $request->has('aller_retour');

        if ($commune) {
            $communeId = $commune->id;
        } else {
            return redirect()->route('aeroport');
        }

        $reservation->commune_id = $communeId;
        // Enregistrez la valeur dans la réservation
        $reservation->aller_retour = $roundTrip;
        $reservation->dropoffLocation = $request->input('dropoffLocation');
        $reservation->cout_total = $request->input('coutTotal');
        $reservation->pickUpDate = Carbon::parse($request->input('pickUpDate'));
        $reservation->pickUpTime = $request->input('pickUpTime');
        // Associez la réservation à l'utilisateur connecté
        $reservation->user_id = $user->id;

        // Enregistrez la réservation
        $reservation->save();

        // Chargez la relation 'vehicule' avec la réservation
        $reservation->load('vehicule');

        Mail::to($user->email)->send(new ReservationAeroportConfirmation($reservation));
        Alert::success('Succès!', 'Votre réservation a été enregistrée avec succès! , Un mail est envoyé à votre compte');

        return redirect()->route('aeroport-confirmation-reservation', ['reservationId' => $reservation->id]);
    }

    public function showReservationConfirmation($reservationId)
    {
        // Récupérez la réservation correspondant à l'ID depuis la base de données
        $reservation = ReservationAeroport::find($reservationId);

        // Affichez les informations de confirmation dans une vue
        return view('aeroport.confirmationPage', compact('reservation'));
    }


}
