<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmation;
use App\Models\Reservation;
use App\Models\ReservationJournaliere;
use App\Models\TypeVehicule;
use App\Models\User;
use App\Models\Vehicule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ReservationController extends Controller
{

    public function getBookingByMe()
    {
        $user = Auth::user(); // Récupérez l'utilisateur connecté

        if ($user) {

            // Récupérez les réservations Annulée
            $reservationsAnnulee = $user->reservations->filter(function ($reservation) {
                return $reservation->statut === 'Annulee';
            });

            // Paginer les réservations en attente
            $currentPageAnnulee = request()->get('page_annulee', 1); // Page actuelle pour les réservations annulee, par défaut 1
            $perPage = 10; // Nombre de réservations par page

            $paginatedReservationsAnnulee = new LengthAwarePaginator(
                $reservationsAnnulee->forPage($currentPageAnnulee, $perPage),
                $reservationsAnnulee->count(),
                $perPage,
                $currentPageAnnulee
            );

            // Récupérez les réservations en attente
            $reservationsEnAttente = $user->reservations->filter(function ($reservation) {
                return $reservation->statut === 'En Attente';
            });

            // Paginer les réservations en attente
            $currentPageEnAttente = request()->get('page_en_attente', 1); // Page actuelle pour les réservations en attente, par défaut 1
            $perPage = 10; // Nombre de réservations par page

            $paginatedReservationsEnAttente = new LengthAwarePaginator(
                $reservationsEnAttente->forPage($currentPageEnAttente, $perPage),
                $reservationsEnAttente->count(),
                $perPage,
                $currentPageEnAttente
            );

            // Récupérez les réservations confirmées
            $reservationsConfirmees = $user->reservations->filter(function ($reservation) {
                return $reservation->statut === 'Confirmee';
            });

            // Paginer les réservations confirmées
            $currentPageConfirmees = request()->get('page_confirmees', 1); // Page actuelle pour les réservations confirmées, par défaut 1

            $paginatedReservationsConfirmees = new LengthAwarePaginator(
                $reservationsConfirmees->forPage($currentPageConfirmees, $perPage),
                $reservationsConfirmees->count(),
                $perPage,
                $currentPageConfirmees
            );

            return view('admin.my-booking', compact('paginatedReservationsEnAttente', 'paginatedReservationsConfirmees', 'paginatedReservationsAnnulee'));
        }

    }

    public function annulerReservation(ReservationJournaliere $reservation)
    {
        // Vérifiez si l'utilisateur connecté est le propriétaire de la réservation
        if (auth()->user()->id == $reservation->user_id) {
            // Mettez à jour le statut de la réservation à "Annulee"
            $reservation->update(['statut' => 'Annulee']);

            // Redirigez l'utilisateur vers une page de confirmation d'annulation
            Alert::success('Succès!', 'Votre réservation a été annulée avec succès!');
            return redirect()->route('booking', ['reservationId' => $reservation->id]);
        } else {
            // L'utilisateur n'est pas autorisé à annuler cette réservation
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à annuler cette réservation.');
        }

    }

    public function getReservationEnAttente()
    {
        // Récupérez les réservations en attente
        $reservationsEnAttente = ReservationJournaliere::where('statut', 'En Attente')
            ->paginate(10); // Vous pouvez ajuster le nombre d'éléments par page ici

        // Récupérez les utilisateurs associés à ces réservations
        $userIds = $reservationsEnAttente->pluck('user_id')->unique()->toArray();
        $users = User::whereIn('id', $userIds)->get();

        return view('admin.validate-reservation', compact('reservationsEnAttente', 'users'));
    }


    public function validerReservations(Request $request)
    {
        $reservationId = $request->input('reservation_id');

        // Vérifiez si la réservation existe
        $reservation = ReservationJournaliere::find($reservationId);

        if ($reservation) {
            // Mettez à jour le statut de la réservation en "Confirmée"
            $reservation->update(['statut' => 'Confirmée']);
            Alert::success('Succès!', 'Votre réservation a été confirmée avec succès!');
            return redirect()->back();
        } else {
            Alert::success('Danger!', 'La réservation n\'existe pas.');
            return redirect()->route('booking');
        }
    }

    public function getReservationConfirmee($userId)
    {
        // Récupérez les réservations confirmées effectuées par un agent spécifique
        $reservationsConfirmees = ReservationJournaliere::where('statut', 'Confirmée')
            ->where('user_id', $userId)
            ->get();

        // Récupérez les informations de l'agent
        $user = User::find($userId);

        return view('admin.reservation-confirme', compact('reservationsConfirmees', 'user'));
    }


}
