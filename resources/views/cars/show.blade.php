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
                            <h1>{{$vehicule->name}}</h1>
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
                                <span class="d-title">Type</span>
                                <span class="d-value">{{$vehicule->type->name}}</span>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Place</span>
                                <span class="d-value">{{$vehicule->capacite_passagers}}</span>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Volant</span>
                                <span class="d-value">{{$vehicule->drive}}</span>
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
                        <h4>Autres</h4>
                        <ul class="ul-style-2">
                            <li>{{$vehicule->bluetooth}}</li>
                            <li>{{$vehicule->multimedia_player}}</li>
                            <li>{{$vehicule->central_lock}}</li>
                            <li>{{$vehicule->sunroof}}</li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <div class="de-price text-center">
                            Tarif
                            <h3 class="montant-total">{{ $vehicule->type->price_journalier }}$</h3>
                        </div>
                        <div class="spacer-30"></div>
                        <div class="de-box mb25">
                            <form method="POST" action="{{ route('reservation') }}">
                                @csrf
                                <!-- Ajoutez un champ de sélection pour choisir le véhicule -->
                                <input type="hidden" name="vehicule_id" value="{{ $vehicule->id }}">

                                <div class="form-group">
                                    <label for="lieu_embarquement">Lieu d'embarquement :</label>
                                    <label for="lieu_embarquement"></label><input type="text" name="lieu_embarquement" id="lieu_embarquement" placeholder="Entrez le lieu d'embarquement" class="form-control">
                                    @error('lieu_embarquement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="lieu_livraison">Lieu de livraison :</label>
                                    <label for="lieu_livraison"></label><input type="text" name="lieu_livraison" id="lieu_livraison" placeholder="Entrez le lieu de livraison" class="form-control">
                                    @error('lieu_livraison')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="debut_reservation">Date de prise en charge :</label>
                                    <label for="debut_reservation"></label><input type="date" name="debut_reservation" id="debut_reservation" placeholder="Date de prise en charge" class="form-control">
                                    @error('debut_reservation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="CollectionDate">Date de retour :</label>
                                    <label for="fin_reservation"></label><input type="date" name="fin_reservation" id="fin_reservation" placeholder="Date de retour" class="form-control">

                                    @error('fin_reservation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <br>
                                <!-- Vous pouvez ajouter d'autres champs de formulaire au besoin -->
                                <button class="btn-main btn-fullwidth" type="submit">Réserver ce véhicule</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
