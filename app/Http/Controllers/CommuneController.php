<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommuneController extends Controller
{
    public function create(){
        return view('communes.create');
    }
}
