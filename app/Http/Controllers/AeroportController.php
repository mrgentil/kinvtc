<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AeroportController extends Controller
{
    public function index()
    {
        return view('aeroport.index');
    }
}
