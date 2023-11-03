@extends('layouts.main') <!-- Si vous utilisez une mise en page -->

@section('content')
    <!-- content begin -->
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{asset('images/background/2.jpg')}}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
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
                    <div class="col-lg-5">

                        <div class="de_tab tab_simple">

                            <ul class="de_nav">
                                <li class="active"><span>INFORMATIONS PERSONNELLES </span></li>
                                @if (Auth::guest())
                                    <li><span>J'ai un compte Kinvtc</span></li>
                                @endif
                            </ul>

                            <div class="de_tab_content">
                                <div class="tab-1">
                                    @if (Auth::check())
                                        <!-- Afficher les informations de l'utilisateur connecté -->
                                        <p>Nom: {{ Auth::user()->name }}</p>
                                        <p>Email: {{ Auth::user()->email }}</p>
                                        <p>Téléphone: {{ Auth::user()->phone }}</p>
                                    @else
                                    <form name="contactForm" id="contact_form" method="POST"
                                          action="{{ route(Auth::check() ? 'reservation-aeroport.connected' : 'reservation-aeroport.guest') }}">
                                        <input type="hidden" name="vehiculeId" value="{{ $vehicule->id }}">
                                        <input type="hidden" name="commune" value="{{ $communeName }}">
                                        <input type="hidden" name="dropoffLocation" value="{{ $dropoffLocation }}">
                                        <input type="hidden" name="coutTotal" value="{{ $prix }}">
                                        <input type="hidden" name="pickUpDate" value="{{ $pickUpDate }}">
                                        <input type="hidden" name="pickUpTime" value="{{ $pickUpTime }}">
                                        <div class="row">
                                            <div class="col-lg-12 mb20">
                                                <h5>Nom complet</h5>
                                                <input type="text" name="name" id="name" class="form-control" required
                                                       placeholder="Entrez votre nom complet"/>
                                            </div>
                                            <div class="col-lg-6 mb20">
                                                <h5>Adresse e-mail</h5>
                                                <input type="email" name="email" id="email" class="form-control"
                                                       required placeholder="Entrez votre adresse e-mail"/>
                                            </div>
                                            <div class="col-lg-6 mb20">
                                                <h5>Numéro de téléphone</h5>
                                                <input type="tel" name="phone" id="phone" class="form-control" required
                                                       placeholder="+243 xxx xxxx"/>
                                            </div>

                                            <div class="col-lg-6 mb20">
                                                <h5>Mot de passe</h5>
                                                <input id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password" required autocomplete="new-password">
                                            </div>

                                            <div class="col-lg-6 mb20">
                                                <h5>Confirmer</h5>
                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation" required
                                                       autocomplete="new-password">
                                            </div>
                                            <div class="col-lg-12 mb20">
                                                <h5>Message ou commentaire</h5>
                                                <textarea class="form-control" name="message" id="message" cols="30"
                                                          rows="20"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="type"
                                               value="{{ Auth::check() ? 'connected' : 'guest' }}">
                                        @csrf
                                        @if (Auth::check())
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        @endif
                                        <!-- <input type='submit' id='send_message' value='Continuer' class="btn-main btn-fullwidth"> -->
                                        <button type="submit" class="btn-main btn-fullwidth">Reserver maintenant
                                        </button>
                                    </form>
                                    @endif
                                </div>
                                <div class="tab-2">
                                    <div class="row">
                                        @guest
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <!-- Champs de réservation -->
                                                <div class="field-set mb-3">
                                                    <input type="email" name="email" id="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           value="{{ old('email') }}" placeholder="Entrer e-mail"
                                                           required
                                                           autocomplete="email" autofocus/>

                                                    @error('email')
                                                    <span class="invalid-feedback"
                                                          role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                                <div class="field-set mb-3">
                                                    <input type="password" name="password" id="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           placeholder="************" required
                                                           autocomplete="current-password"/>
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div id="submit" class="mb-3">
                                                    <button type="submit" class="btn-main btn-fullwidth rounded-3">Se
                                                        connecter
                                                    </button>
                                                </div>
                                            </form>
                                        @endguest

                                        <div class="spacer-20"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb20">
                                <div class="switch-with-title s2">
                                    <h5>Détail du tarif de la location</h5>

                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-md-8 col-lg-8">
                                            Montant de la location : &nbsp; ${{$prix}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            Notre Avis de <a href="donnee_personnelle.php">confidentialité</a> explique comment nous
                            utilisons et protégeons vos données personnelles.
                        </div>
                    </div>
                    <div class="col-lg-3">

                        <h3>{{$vehicule->name}}</h3>
                        <div class="spacer-10"></div>

                        <h4>Spécifications</h4>
                        <div class="de-spec">

                            <div class="d-row">
                                <span class="d-title">Place</span>
                                <span class="d-value">{{$vehicule->capacite_passagers}}</span>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Kilometrage</span>
                                <span class="d-value">{{$vehicule->kilometrage}}</span>
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

                    <div class="col-lg-4">
                        <div class="de-price text-center">
                            Total à payer :
                            <h3 class="montant-total">${{ $roundTrip ? $prix : $prix * 2 }}</h3>
                        </div>
                        <div class="spacer-30"></div>
                        <div class="de-box mb25">
                            <form method="POST" action="{{ route('reservation-aeroport.connected') }}">
                                @csrf
                                <h4>Réservation du véhicule</h4>
                                <input type="hidden" name="vehiculeId" value="{{ $vehicule->id }}">
                                <input type="hidden" name="commune" value="{{ $communeName }}">
                                <input type="hidden" name="dropoffLocation" value="{{ $dropoffLocation }}">
                                <input type="hidden" name="coutTotal" value="{{ $prix }}">
                                <input type="hidden" name="pickUpDate" value="{{ $pickUpDate }}">
                                <input type="hidden" name="pickUpTime" value="{{ $pickUpTime }}">
                                <!-- Dans n'importe quelle étape du processus de réservation -->
                                <input type="hidden" name="aller_retour" value="{{ $roundTrip }}">

                                <div class="spacer-20"></div>

                                <p>Nom du véhicule : {{ $vehicule->name }}</p>
                                <p>Commune : {{ $communeName }}</p>
                                <p>Destination : {{ $dropoffLocation }}</p>
                                <p>Date de début : {{ $pickUpDate }}</p>
                                <p>Heure de début : {{ $pickUpTime }}</p>
                                <p>Prix : ${{ $roundTrip ? $prix : $prix * 2 }}</p>


                                @auth
                                    <button type="submit" class="btn-main btn-fullwidth">Reserver</button>
                                @endauth
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

