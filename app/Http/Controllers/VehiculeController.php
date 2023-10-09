<?php

namespace App\Http\Controllers;

use App\Http\Repositories\VehiculeRepository;
use App\Models\TypeVehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * @var VehiculeRepository
     */
    private VehiculeRepository $vehiculeRepository;

    public function __construct(VehiculeRepository $vehiculeRepository)
    {
        $this->vehiculeRepository = $vehiculeRepository;
    }

    public function index()
    {
        $vehicules = $this->vehiculeRepository->getLatest(9);
        $typesDeVehicules = TypeVehicule::all();
        return view('cars.index',compact('vehicules','typesDeVehicules'));
    }

    public function show(string $slug)
    {
        $vehicule = $this->vehiculeRepository->getVehicule($slug);
        return view('cars.show', compact('vehicule'));
    }
}
