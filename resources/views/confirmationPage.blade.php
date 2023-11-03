<!-- resources/views/confirmationPage.blade.php -->

@extends('layouts.main') <!-- Assurez-vous que le nom du layout correspond à votre structure de mise en page -->

@section('content')
    @include('sweetalert::alert')
    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="{{asset('images/background/subheader.jpg')}}" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Confirmation réservation {{ $reservation->vehicule->name }}</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->


    <!-- section begin -->
    <section aria-label="section">
        <div class="container">
            <p>Votre réservation a été confirmée. Voici les détails de votre réservation :</p>

            <ul>
                <li>Véhicule : {{ $reservation->vehicule->name }}</li>
                <li>Lieu d'embarquement : {{ $reservation->pickup_location }}</li>
                <li>Date de début : {{ $reservation->pick_up_date }}</li>
                <li>Date de retour : {{ $reservation->collection_date }}</li>
                <li>Montant total : {{ $reservation->cout_total }}$</li>
            </ul>

            <p>Merci d'utiliser notre service. <a href="https://maxicashme.com/KINVTC">Cliquez ici pour effectuer votre paiement</a></p>
        </div>
    </section>
    <!-- section close -->
@endsection
