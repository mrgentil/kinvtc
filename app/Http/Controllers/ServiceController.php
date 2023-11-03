<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmation;
use App\Models\ReservationJournaliere;
use App\Models\TypeVehicule;
use App\Models\User;
use App\Models\Vehicule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index');
    }

    public function vehicules(Request $request)
    {
        $type = TypeVehicule::all();
        $pickupLocation = $request->input('pickupLocation');
        $pickUpDate = $request->input('pickUpDate');
        $pickUpTime = $request->input('pickUpTime');
        $collectionDate = $request->input('collectionDate');
        $collectionTime = $request->input('collectionTime');

        // Récupérez tous les véhicules depuis la base de données
        $vehicules = Vehicule::all();

        // Calculez la différence en jours entre les dates de début et de retour
        $pickUpDate = Carbon::parse($pickUpDate);
        $collectionDate = Carbon::parse($collectionDate);
        $differenceEnJours = $collectionDate->diffInDays($pickUpDate);
        if ($differenceEnJours === 0) {
            $differenceEnJours = 1;
        }

        // Créez un tableau pour stocker les informations sur les véhicules avec les coûts totaux
        $vehiculeInfos = [];

        foreach ($vehicules as $vehicule) {
            // Récupérez le prix journalier de chaque véhicule
            $prixJournalier = $vehicule->type->price_journalier;

            $heureDebut = Carbon::parse('07:00:00');
            $heureLimite1 = Carbon::parse('20:30:00');
            $heureLimite2 = Carbon::parse('23:30:00');

            // Calculez le coût total initial en fonction de la durée en jours
            $coutTotal = $prixJournalier * $differenceEnJours;

            // Vérifiez les horaires et ajustez le coût total en conséquence
            if ($pickUpTime >= $heureLimite1 && $collectionTime <= $heureLimite2) {
                $coutTotal += 20; // Ajoutez 20 $ au coût total
            } elseif ($collectionTime > $heureLimite2) {
                $coutTotal += 50; // Ajoutez 50 $ au coût total
            }
            // Stockez les informations dans le tableau
            $vehiculeInfos[] = [
                'vehicule' => $vehicule,
                'coutTotal' => $coutTotal,
            ];
        }

        return view('reservations.index', compact('type', 'pickupLocation', 'pickUpDate', 'pickUpTime', 'collectionDate', 'collectionTime', 'vehiculeInfos', 'differenceEnJours'));
    }

    public function update(Request $request)
    {
        // Validez les données du formulaire
        $this->validate($request, [
            'PickupLocation' => 'required',
            'Pick_Up_Date' => 'required',
            'Pick_Up_Time' => 'required',
            'Collection_Date' => 'required',
            'Collection_Time' => 'required',
        ]);

        if (request()->has('reserve_jour')) {
            // Récupérer les nouvelles valeurs soumises depuis le formulaire
            $newPickupLocation = request('pickupLocation');
            $newPickUpDate = request('pickUpDate');
            $newPickUpTime = request('pickUpTime');
            $newCollectionDate = request('collectionDate');
            $newCollectionTime = request('collectionTime');

            // Mettre à jour les valeurs en session
            session(['pickupLocation' => $newPickupLocation]);
            session(['pickUpDate' => $newPickUpDate]);
            session(['pickUpTime' => $newPickUpTime]);
            session(['collectionDate' => $newCollectionDate]);
            session(['collectionTime' => $newCollectionTime]);
        }

    }

    public function show(Request $request, $id)
    {
        // Récupérez le véhicule correspondant à l'ID
        $vehicule = Vehicule::find($id);

        // Récupérez le coutTotal depuis la requête
        $coutTotal = $request->input('coutTotal');
        // Récupérez le lieu d'embarquement depuis la requête
        $pickupLocation = $request->input('pickupLocation');

        // Récupérez le nombre de jours depuis la requête
        $differenceEnJours = $request->input('differenceEnJours');
        // Récupérez la date et l'heure de début et de retour depuis la requête
        $pickUpDate = $request->input('pickUpDate');
        $pickUpTime = $request->input('pickUpTime');
        $collectionDate = $request->input('collectionDate');
        $collectionTime = $request->input('collectionTime');
        return view('cars.show', compact('vehicule', 'coutTotal',
            'pickupLocation', 'differenceEnJours','collectionTime','collectionDate','pickUpTime','pickUpDate'));
    }



    public function reservationFirst(Request $request)
    {
        // Récupérez l'ID du véhicule depuis la requête GET
        $vehiculeId = $request->input('vehiculeId');
        $vehicule = Vehicule::find($vehiculeId);
        // Récupérez les données des paramètres de la requête GET
        $pickupLocation = $request->input('pickupLocation');
        $coutTotal = $request->input('coutTotal');
        $pickUpDate = $request->input('pickUpDate');
        $pickUpTime = $request->input('pickUpTime');
        $collectionDate = $request->input('collectionDate');
        $collectionTime = $request->input('collectionTime');
        $differenceEnJours = $request->input('differenceEnJours');
        return view('reservations.reservationFirst', compact('pickupLocation', 'pickUpDate', 'pickUpTime', 'collectionDate', 'collectionTime','coutTotal','vehicule','differenceEnJours'));
    }


    public function processReservationConnected(Request $request) {
        // Validez les données du formulaire de réservation (personnalisez les règles de validation selon vos besoins)
        $this->validate($request, [
            'pickupLocation' => 'required',
            'pickUpDate' => 'required',
            'pickUpTime' => 'required',
            'collectionDate' => 'required',
            'collectionTime' => 'required',
            // Ajoutez les autres règles de validation nécessaires
        ]);

        // Vérifiez si l'utilisateur est authentifié
        if (Auth::check()) {
            $user = Auth::user();

            // Créez une nouvelle instance de réservation
            $reservation = new ReservationJournaliere();

            // Remplissez les champs de réservation avec les données du formulaire
            $reservation->vehicule_id = $request->input('vehiculeId');
            $reservation->pickup_location = $request->input('pickupLocation');
            $reservation->cout_total = $request->input('coutTotal');
            $reservation->pick_up_date = Carbon::parse($request->input('pickUpDate'));
            $reservation->pick_up_time = $request->input('pickUpTime');
            $reservation->collection_date = Carbon::parse($request->input('collectionDate'));

            $reservation->collection_time = Carbon::parse($request->input('collectionTime'));
            $reservation->difference_en_jours = $request->input('differenceEnJours');

            // Associez la réservation à l'utilisateur connecté
            $reservation->user_id = $user->id;

            //dd($request->all());

            // Enregistrez la réservation
            $reservation->save();

            // Chargez la relation 'vehicule' avec la réservation
            $reservation->load('vehicule');

            Mail::to($user->email)->send(new ReservationConfirmation($reservation));
            Alert::success('Succès!', 'Votre réservation a été enregistrée avec succès! , Un mail est envoyé à votre compte');
            return redirect()->route('confirmation-reservation', ['reservationId' => $reservation->id]);
        } else {
            // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
            return redirect()->route('login');
        }
    }

    public function processReservationGuest(Request $request){
        // Validez les données du formulaire (vous pouvez personnaliser les règles de validation)
        // Créez un nouvel utilisateur avec les informations du formulaire
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->message = $request->input('message');

        $user->save();
        // Créez une nouvelle instance de réservation
        $reservation = new ReservationJournaliere();
        $reservation->vehicule_id = $request->input('vehiculeId');
        $reservation->pickup_location = $request->input('pickupLocation');
        $reservation->cout_total = $request->input('coutTotal');
        $reservation->pick_up_date = Carbon::parse($request->input('pickUpDate'));
        $reservation->pick_up_time = $request->input('pickUpTime');
        $reservation->collection_date = Carbon::parse($request->input('collectionDate'));

        $reservation->collection_time = Carbon::parse($request->input('collectionTime'));
        $reservation->difference_en_jours = $request->input('differenceEnJours');
        $reservation->user_id = $user->id;

        $reservation->save();

        // Chargez la relation 'vehicule' avec la réservation
        $reservation->load('vehicule');

        Mail::to($user->email)->send(new ReservationConfirmation($reservation));
        Alert::success('Succès!', 'Votre réservation a été enregistrée avec succès! , Un mail est envoyé à votre compte');
        return redirect()->route('confirmation-reservation', ['reservationId' => $reservation->id]);

    }

    public function showReservationConfirmation($reservationId) {
        // Récupérez la réservation correspondant à l'ID depuis la base de données
        $reservation = ReservationJournaliere::find($reservationId);

        // Affichez les informations de confirmation dans une vue
        return view('confirmationPage', compact('reservation'));
    }

}
