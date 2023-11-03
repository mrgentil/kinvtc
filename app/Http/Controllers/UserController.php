<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function profile(){

        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Récupérez l'utilisateur connecté



        // Mettez à jour les informations du profil
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        Alert::success('success', 'Profil mis à jour avec succès');
        return redirect()->route('profile', ['user' => $user]);
    }

}
