<?php

namespace App\Http\Controllers;

use App\Http\Repositories\VehiculeRepository;
use App\Models\ReservationJournaliere;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * @var VehiculeRepository
     */
    private VehiculeRepository $vehiculeRepository;

    public function __construct(VehiculeRepository $vehiculeRepository)
    {
        $this->vehiculeRepository = $vehiculeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vehicules = $this->vehiculeRepository->getLatest(9);
        return view('home', compact('vehicules'));
    }

    public function dashboard()
    {
        $user = Auth::user();

        $reservationsall = ReservationJournaliere::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);// Paginez les résultats, en affichant 10 réservations par page

        $totalReservations = ReservationJournaliere::count();

        $totalCanceledReservations = ReservationJournaliere::where('statut', 'Annulee')->count();

        $frequentlyReservedVehicles = ReservationJournaliere::where('user_id', $user->id)
            ->groupBy('vehicule_id')
            ->select('vehicule_id', \DB::raw('count(*) as reservation_count'))
            ->orderBy('reservation_count', 'desc')
            ->with('vehicule') // Assurez-vous que vous avez défini la relation entre Reservation et Vehicule
            ->paginate(10); // Paginez les résultats, en affichant 10 véhicules par page
        return view('admin.home', compact('totalReservations', 'totalCanceledReservations', 'reservationsall', 'frequentlyReservedVehicles'));
    }

//    public function getFrequentlyReservedVehicles()
//    {
//        $user = Auth::user();
//
//        $frequentlyReservedVehicles = ReservationController::where('user_id', $user->id)
//            ->groupBy('vehicule_id')
//            ->select('vehicule_id', \DB::raw('count(*) as reservation_count'))
//            ->orderBy('reservation_count', 'desc')
//            ->with('vehicule') // Assurez-vous que vous avez défini la relation entre Reservation et Vehicule
//            ->paginate(10); // Paginez les résultats, en affichant 10 véhicules par page
//
//        return view('admin.home', compact('frequentlyReservedVehicles'));
//    }
}
