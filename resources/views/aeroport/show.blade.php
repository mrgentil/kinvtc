@extends('layouts.main')

@section('content')
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{asset('images/background/2.jpg')}}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <!-- Message de Succès après le Vote -->
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Message de Connexion Requis -->
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>{{$vehicule->name}} </h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-car-details">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div id="slider-carousel" class="owl-carousel">
                            <div class="item">
                                <img src="{{Voyager::image($vehicule->image_slider1)}}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{Voyager::image($vehicule->image_slider2)}}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{Voyager::image($vehicule->image_slider3)}}" alt="">
                            </div>
                            <div class="item">
                                <img src="{{Voyager::image($vehicule->image_slider4)}}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <h3>{{$vehicule->name}}</h3>
                        <div class="spacer-10"></div>

                        <h4>Specifications</h4>
                        <div class="de-spec">
                            <div class="d-row">
                                <span class="d-title">Kilometrage</span>
                                <span class="d-value">{{$vehicule->kilometrage}}</span>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Place</span>
                                <span class="d-value">{{$vehicule->capacite_passagers}}</span>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Couleur Externe</span>
                                <span class="d-value">{{$vehicule->exterior_color}}</span>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Couleur Interne</span>
                                <span class="d-value">{{$vehicule->interior_color}}</span>
                            </div>
                        </div>

                        <div class="spacer-single"></div>
                    </div>
                    <div class="col-lg-3">
                        <div class="de-price text-center">
                            Prix Initial : ${{$vehicule->price}}
                            @if ($roundTrip)
                                <span>Prix Aller/Retour : ${{ $prix * 2 }}</span>
                            @endif
                            <h3 class="montant-total"></h3>
                        </div>
                        <div class="spacer-30"></div>
                        <div class="de-box mb25">
                            <form method="GET" action="{{ route('aeroports.reservations') }}">
                                @csrf
                                <h4>Informations réservation</h4>

                                <input type="hidden" name="commune" value="{{ $vehicule->commune->name }}">
                                <input type="hidden" name="vehiculeName" value="{{ $vehicule->name }}">

                                <input type="hidden" name="dropoffLocation" value="{{ $dropoffLocation }}">
                                <input type="hidden" name="price" value="{{ $prix }}">
                                <input type="hidden" name="pickUpDate" value="{{ $pickUpDate }}">
                                <input type="hidden" name="pickUpTime" value="{{ $pickUpTime }}">


                                <div class="spacer-20"></div>
                                <p>Nom du véhicule : {{ $vehicule->name }}</p>
                                <p>Commune : {{ $vehicule->commune->name }}</p>
                                <p>Destination : {{ $dropoffLocation }}</p>
                                <p>Date de début : {{ $pickUpDate }}</p>
                                <p>Heure de début : {{ $pickUpTime }}</p>
                                <p>Prix : ${{ $prix }}</p>
                                @if ($roundTrip)
                                    <p>Prix Aller/Retour : ${{ $prix * 2 }}</p>
                                @endif
                                <!-- <input type='submit' id='send_message' value='Continuer' class="btn-main btn-fullwidth"> -->
                                <button type="submit" class="btn-main btn-fullwidth">Continuer</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
