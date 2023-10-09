<?php

namespace App\Http\Controllers;

use App\Http\Repositories\VehiculeRepository;
use Illuminate\Http\Request;

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
        return view('home',compact('vehicules'));
    }
}
