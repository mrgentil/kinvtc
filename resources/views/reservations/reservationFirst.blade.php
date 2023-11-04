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
                            <h1>{{$vehicule->name}} x ({{ $differenceEnJours }} Jr)</h1>
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
                                          action="{{ route(Auth::check() ? 'reservation.connected' : 'reservation.guest') }}">
                                        <input type="hidden" name="vehiculeId" value="{{ $vehicule->id }}">
                                        <input type="hidden" name="pickupLocation" value="{{ $pickupLocation }}">
                                        <input type="hidden" name="coutTotal" value="{{ $coutTotal }}">
                                        <input type="hidden" name="pickUpDate" value="{{ $pickUpDate }}">
                                        <input type="hidden" name="pickUpTime" value="{{ $pickUpTime }}">
                                        <input type="hidden" name="collectionDate" value="{{ $collectionDate }}">
                                        <input type="hidden" name="collectionTime" value="{{ $collectionTime }}">
                                        <input type="hidden" name="differenceEnJours" value="{{ $differenceEnJours }}">
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
                                                           value="{{ old('email') }}" placeholder="Entrer e-mail" required
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
                                                    <button type="submit" class="btn-main btn-fullwidth rounded-3">Se connecter</button>
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
                                            Montant de la location journalière
                                        </div>
                                        <div class="col-md-2 col-lg-2">
                                            : &nbsp; {{$coutTotal}}$
                                        </div>
                                        <div class="col-md-8 col-lg-8">
                                            Assurance
                                        </div>
                                        <div class="col-md-2 col-lg-2">
                                            : &nbsp; 0$
                                        </div>

                                        <div class="col-md-8 col-lg-8">
                                            <h5>Prix ​​pour jours</h5>
                                        </div>
                                        <div class="col-md-4 col-lg-4 mb-3">
                                            <h5> : &nbsp; {{$vehicule->type->price_journalier}}$</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            Notre Avis de <a href="donnee_personnelle.php">confidentialité</a> explique comment nous
                            utilisons et protégeons vos données personnelles.
                        </div>


                    </div>

                    <div class="col-lg-3">

                        <h3>{{$vehicule->name}} x ({{ $differenceEnJours }} Jr)</h3>
                        <div class="spacer-10"></div>

                        <h4>Spécifications</h4>
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

                        <h4>Caractéristiques</h4>
                        <ul class="ul-style-2">
                            <li>Bluetooth</li>
                            <li>Multimedia Player</li>

                        </ul>
                    </div>

                    <div class="col-lg-4">
                        <div class="de-price text-center">
                            Prix Initial : ${{$vehicule->type->price_journalier}} / Jr
                            <h3 class="montant-total">${{$coutTotal}}</h3>
                        </div>
                        <div class="spacer-30"></div>
                        <div class="de-box mb25">
                            <form method="POST" action="{{ route('reservation.connected') }}">
                                @csrf
                                <input type="hidden" name="vehiculeId" value="{{ $vehicule->id }}">
                                <input type="hidden" name="pickupLocation" value="{{ $pickupLocation }}">
                                <input type="hidden" name="coutTotal" value="{{ $coutTotal }}">
                                <input type="hidden" name="pickUpDate" value="{{ $pickUpDate }}">
                                <input type="hidden" name="pickUpTime" value="{{ $pickUpTime }}">
                                <input type="hidden" name="collectionDate" value="{{ $collectionDate }}">
                                <input type="hidden" name="collectionTime" value="{{ $collectionTime }}">
                                <input type="hidden" name="differenceEnJours" value="{{ $differenceEnJours }}">
                                <h4>Réservation du véhicule</h4>

                                <div class="spacer-20"></div>

                                <div class="row">
                                    <div class="col-lg-12 mb20">
                                        <h5>Lieu d'embarquement</h5>
                                        <input type="text" name="PickupLocation" value="{{$pickupLocation}}"
                                               placeholder="Enter your pickup location" id="autocomplete"
                                               autocomplete="off" class="form-control" disabled>

                                        <div class="jls-address-preview jls-address-preview--hidden">
                                            <div class="jls-address-preview__header">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb20">
                                        <h5>Date et heure de début</h5>
                                        <div class="date-time-field">
                                            <input type="text" id="date-picker" name="pickUpDate"
                                                   value="{{ old('pickUpDate', $pickUpDate) }}" required>
                                            <select name="pickUpTime" id="pickup-time" required>
                                                <!-- <option selected disabled value="Select time">Time</option> -->
                                                <option value=""></option>
                                                <option
                                                    value="00:00" {{ old('Pick_Up_Time', $pickUpTime) == '00:00' ? 'selected' : '' }}>
                                                    00:00
                                                </option>
                                                <option
                                                    value="00:30" {{ old('Pick_Up_Time', $pickUpTime) == '00:30' ? 'selected' : '' }}>
                                                    00:30
                                                </option>
                                                <option
                                                    value="01:00" {{ old('Pick_Up_Time', $pickUpTime) == '01:00' ? 'selected' : '' }}>
                                                    01:00
                                                </option>
                                                <option
                                                    value="01:30" {{ old('Pick_Up_Time', $pickUpTime) == '01:00' ? 'selected' : '' }}>
                                                    01:30
                                                </option>
                                                <option
                                                    value="02:00" {{ old('Pick_Up_Time', $pickUpTime) == '01:30' ? 'selected' : '' }}>
                                                    02:00
                                                </option>
                                                <option
                                                    value="02:30" {{ old('Pick_Up_Time', $pickUpTime) == '02:00' ? 'selected' : '' }}>
                                                    02:30
                                                </option>
                                                <option
                                                    value="03:00" {{ old('Pick_Up_Time', $pickUpTime) == '02:30' ? 'selected' : '' }}>
                                                    03:00
                                                </option>
                                                <option
                                                    value="03:30" {{ old('Pick_Up_Time', $pickUpTime) == '03:00' ? 'selected' : '' }}>
                                                    03:30
                                                </option>
                                                <option
                                                    value="04:00" {{ old('Pick_Up_Time', $pickUpTime) == '04:00' ? 'selected' : '' }}>
                                                    04:00
                                                </option>
                                                <option
                                                    value="04:30" {{ old('Pick_Up_Time', $pickUpTime) == '04:30' ? 'selected' : '' }}>
                                                    04:30
                                                </option>
                                                <option
                                                    value="05:00" {{ old('Pick_Up_Time', $pickUpTime) == '05:00' ? 'selected' : '' }}>
                                                    05:00
                                                </option>
                                                <option
                                                    value="05:30" {{ old('Pick_Up_Time', $pickUpTime) == '05:30' ? 'selected' : '' }}>
                                                    05:30
                                                </option>
                                                <option
                                                    value="06:00" {{ old('Pick_Up_Time', $pickUpTime) == '06:00' ? 'selected' : '' }}>
                                                    06:00
                                                </option>
                                                <option
                                                    value="06:30" {{ old('Pick_Up_Time', $pickUpTime) == '06:30' ? 'selected' : '' }}>
                                                    06:30
                                                </option>
                                                <option
                                                    value="07:00" {{ old('Pick_Up_Time', $pickUpTime) == '07:00' ? 'selected' : '' }}>
                                                    07:00
                                                </option>
                                                <option
                                                    value="07:30" {{ old('Pick_Up_Time', $pickUpTime) == '07:30' ? 'selected' : '' }}>
                                                    07:30
                                                </option>
                                                <option
                                                    value="08:00" {{ old('Pick_Up_Time', $pickUpTime) == '08:00' ? 'selected' : '' }}>
                                                    08:00
                                                </option>
                                                <option
                                                    value="08:30" {{ old('Pick_Up_Time', $pickUpTime) == '08:30' ? 'selected' : '' }}>
                                                    08:30
                                                </option>
                                                <option
                                                    value="09:00" {{ old('Pick_Up_Time', $pickUpTime) == '09:00' ? 'selected' : '' }}>
                                                    09:00
                                                </option>
                                                <option
                                                    value="09:30" {{ old('Pick_Up_Time', $pickUpTime) == '09:30' ? 'selected' : '' }}>
                                                    09:30
                                                </option>
                                                <option
                                                    value="10:00" {{ old('Pick_Up_Time', $pickUpTime) == '10:00' ? 'selected' : '' }}>
                                                    10:00
                                                </option>
                                                <option
                                                    value="10:30" {{ old('Pick_Up_Time', $pickUpTime) == '10:30' ? 'selected' : '' }}>
                                                    10:30
                                                </option>
                                                <option
                                                    value="11:00" {{ old('Pick_Up_Time', $pickUpTime) == '11:00' ? 'selected' : '' }}>
                                                    11:00
                                                </option>
                                                <option
                                                    value="11:30" {{ old('Pick_Up_Time', $pickUpTime) == '11:30' ? 'selected' : '' }}>
                                                    11:30
                                                </option>
                                                <option
                                                    value="12:00" {{ old('Pick_Up_Time', $pickUpTime) == '12:00' ? 'selected' : '' }}>
                                                    12:00
                                                </option>
                                                <option
                                                    value="12:30" {{ old('Pick_Up_Time', $pickUpTime) == '12:30' ? 'selected' : '' }}>
                                                    12:30
                                                </option>
                                                <option
                                                    value="13:00" {{ old('Pick_Up_Time', $pickUpTime) == '13:00' ? 'selected' : '' }}>
                                                    13:00
                                                </option>
                                                <option
                                                    value="13:30" {{ old('Pick_Up_Time', $pickUpTime) == '13:30' ? 'selected' : '' }}>
                                                    13:30
                                                </option>
                                                <option
                                                    value="14:00" {{ old('Pick_Up_Time', $pickUpTime) == '14:00' ? 'selected' : '' }}>
                                                    14:00
                                                </option>
                                                <option
                                                    value="14:30" {{ old('Pick_Up_Time', $pickUpTime) == '14:30' ? 'selected' : '' }}>
                                                    14:30
                                                </option>
                                                <option
                                                    value="15:00" {{ old('Pick_Up_Time', $pickUpTime) == '15:00' ? 'selected' : '' }}>
                                                    15:00
                                                </option>
                                                <option
                                                    value="15:30" {{ old('Pick_Up_Time', $pickUpTime) == '15:30' ? 'selected' : '' }}>
                                                    15:30
                                                </option>
                                                <option
                                                    value="16:00" {{ old('Pick_Up_Time', $pickUpTime) == '16:00' ? 'selected' : '' }}>
                                                    16:00
                                                </option>
                                                <option
                                                    value="16:30" {{ old('Pick_Up_Time', $pickUpTime) == '16:30' ? 'selected' : '' }}>
                                                    16:30
                                                </option>
                                                <option
                                                    value="17:00" {{ old('Pick_Up_Time', $pickUpTime) == '17:00' ? 'selected' : '' }}>
                                                    17:00
                                                </option>
                                                <option
                                                    value="17:30" {{ old('Pick_Up_Time', $pickUpTime) == '17:30' ? 'selected' : '' }}>
                                                    17:30
                                                </option>
                                                <option
                                                    value="18:00" {{ old('Pick_Up_Time', $pickUpTime) == '18:00' ? 'selected' : '' }}>
                                                    18:00
                                                </option>
                                                <option
                                                    value="18:30" {{ old('Pick_Up_Time', $pickUpTime) == '18:30' ? 'selected' : '' }}>
                                                    18:30
                                                </option>
                                                <option
                                                    value="19:00" {{ old('Pick_Up_Time', $pickUpTime) == '19:00' ? 'selected' : '' }}>
                                                    19:00
                                                </option>
                                                <option
                                                    value="19:30" {{ old('Pick_Up_Time', $pickUpTime) == '19:30' ? 'selected' : '' }}>
                                                    19:30
                                                </option>
                                                <option
                                                    value="20:00" {{ old('Pick_Up_Time', $pickUpTime) == '20:00' ? 'selected' : '' }}>
                                                    20:00
                                                </option>
                                                <option
                                                    value="20:30" {{ old('Pick_Up_Time', $pickUpTime) == '20:30' ? 'selected' : '' }}>
                                                    20:30
                                                </option>
                                                <option
                                                    value="21:00" {{ old('Pick_Up_Time', $pickUpTime) == '21:00' ? 'selected' : '' }}>
                                                    21:00
                                                </option>
                                                <option
                                                    value="21:30" {{ old('Pick_Up_Time', $pickUpTime) == '21:30' ? 'selected' : '' }}>
                                                    21:30
                                                </option>
                                                <option
                                                    value="22:00" {{ old('Pick_Up_Time', $pickUpTime) == '22:00' ? 'selected' : '' }}>
                                                    22:00
                                                </option>
                                                <option
                                                    value="22:30" {{ old('Pick_Up_Time', $pickUpTime) == '22:30' ? 'selected' : '' }}>
                                                    22:30
                                                </option>
                                                <option
                                                    value="23:00" {{ old('Pick_Up_Time', $pickUpTime) == '23:00' ? 'selected' : '' }}>
                                                    23:00
                                                </option>
                                                <option
                                                    value="23:30" {{ old('Pick_Up_Time', $pickUpTime) == '23:30' ? 'selected' : '' }}>
                                                    23:30
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb20">
                                        <h5>Date et heure de retour</h5>
                                        <div class="date-time-field">
                                            <input type="text" id="date-picker-2" name="collectionDate"
                                                   value="{{ old('collectionDate', $collectionDate) }}"
                                                   required>
                                            <select name="collectionTime" id="collection-time" required>
                                                <!-- <option selected disabled value="Select time">Time</option> -->
                                                <option value=""></option>
                                                <option
                                                    value="00:00" {{ old('Collection_Time', $collectionTime) == '00:00' ? 'selected' : '' }}>
                                                    00:00
                                                </option>
                                                <option
                                                    value="00:30" {{ old('Collection_Time', $collectionTime) == '00:30' ? 'selected' : '' }}>
                                                    00:30
                                                </option>
                                                <option
                                                    value="01:00" {{ old('Collection_Time', $collectionTime) == '01:00' ? 'selected' : '' }}>
                                                    01:00
                                                </option>
                                                <option
                                                    value="01:30" {{ old('Collection_Time', $collectionTime) == '01:00' ? 'selected' : '' }}>
                                                    01:30
                                                </option>
                                                <option
                                                    value="02:00" {{ old('Collection_Time', $collectionTime) == '01:30' ? 'selected' : '' }}>
                                                    02:00
                                                </option>
                                                <option
                                                    value="02:30" {{ old('Collection_Time', $collectionTime) == '02:00' ? 'selected' : '' }}>
                                                    02:30
                                                </option>
                                                <option
                                                    value="03:00" {{ old('Collection_Time', $collectionTime) == '02:30' ? 'selected' : '' }}>
                                                    03:00
                                                </option>
                                                <option
                                                    value="03:30" {{ old('Collection_Time', $collectionTime) == '03:00' ? 'selected' : '' }}>
                                                    03:30
                                                </option>
                                                <option
                                                    value="04:00" {{ old('Collection_Time', $collectionTime) == '04:00' ? 'selected' : '' }}>
                                                    04:00
                                                </option>
                                                <option
                                                    value="04:30" {{ old('Collection_Time', $collectionTime) == '04:30' ? 'selected' : '' }}>
                                                    04:30
                                                </option>
                                                <option
                                                    value="05:00" {{ old('Collection_Time', $collectionTime) == '05:00' ? 'selected' : '' }}>
                                                    05:00
                                                </option>
                                                <option
                                                    value="05:30" {{ old('Collection_Time', $collectionTime) == '05:30' ? 'selected' : '' }}>
                                                    05:30
                                                </option>
                                                <option
                                                    value="06:00" {{ old('Collection_Time', $collectionTime) == '06:00' ? 'selected' : '' }}>
                                                    06:00
                                                </option>
                                                <option
                                                    value="06:30" {{ old('Collection_Time', $collectionTime) == '06:30' ? 'selected' : '' }}>
                                                    06:30
                                                </option>
                                                <option
                                                    value="07:00" {{ old('Collection_Time', $collectionTime) == '07:00' ? 'selected' : '' }}>
                                                    07:00
                                                </option>
                                                <option
                                                    value="07:30" {{ old('Collection_Time', $collectionTime) == '07:30' ? 'selected' : '' }}>
                                                    07:30
                                                </option>
                                                <option
                                                    value="08:00" {{ old('Collection_Time', $collectionTime) == '08:00' ? 'selected' : '' }}>
                                                    08:00
                                                </option>
                                                <option
                                                    value="08:30" {{ old('Collection_Time', $collectionTime) == '08:30' ? 'selected' : '' }}>
                                                    08:30
                                                </option>
                                                <option
                                                    value="09:00" {{ old('Collection_Time', $collectionTime) == '09:00' ? 'selected' : '' }}>
                                                    09:00
                                                </option>
                                                <option
                                                    value="09:30" {{ old('Collection_Time', $collectionTime) == '09:30' ? 'selected' : '' }}>
                                                    09:30
                                                </option>
                                                <option
                                                    value="10:00" {{ old('Collection_Time', $collectionTime) == '10:00' ? 'selected' : '' }}>
                                                    10:00
                                                </option>
                                                <option
                                                    value="10:30" {{ old('Collection_Time', $collectionTime) == '10:30' ? 'selected' : '' }}>
                                                    10:30
                                                </option>
                                                <option
                                                    value="11:00" {{ old('Collection_Time', $collectionTime) == '11:00' ? 'selected' : '' }}>
                                                    11:00
                                                </option>
                                                <option
                                                    value="11:30" {{ old('Collection_Time', $collectionTime) == '11:30' ? 'selected' : '' }}>
                                                    11:30
                                                </option>
                                                <option
                                                    value="12:00" {{ old('Collection_Time', $collectionTime) == '12:00' ? 'selected' : '' }}>
                                                    12:00
                                                </option>
                                                <option
                                                    value="12:30" {{ old('Collection_Time', $collectionTime) == '12:30' ? 'selected' : '' }}>
                                                    12:30
                                                </option>
                                                <option
                                                    value="13:00" {{ old('Collection_Time', $collectionTime) == '13:00' ? 'selected' : '' }}>
                                                    13:00
                                                </option>
                                                <option
                                                    value="13:30" {{ old('Collection_Time', $collectionTime) == '13:30' ? 'selected' : '' }}>
                                                    13:30
                                                </option>
                                                <option
                                                    value="14:00" {{ old('Collection_Time', $collectionTime) == '14:00' ? 'selected' : '' }}>
                                                    14:00
                                                </option>
                                                <option
                                                    value="14:30" {{ old('Collection_Time', $collectionTime) == '14:30' ? 'selected' : '' }}>
                                                    14:30
                                                </option>
                                                <option
                                                    value="15:00" {{ old('Collection_Time', $collectionTime) == '15:00' ? 'selected' : '' }}>
                                                    15:00
                                                </option>
                                                <option
                                                    value="15:30" {{ old('Collection_Time', $collectionTime) == '15:30' ? 'selected' : '' }}>
                                                    15:30
                                                </option>
                                                <option
                                                    value="16:00" {{ old('Collection_Time', $collectionTime) == '16:00' ? 'selected' : '' }}>
                                                    16:00
                                                </option>
                                                <option
                                                    value="16:30" {{ old('Collection_Time', $collectionTime) == '16:30' ? 'selected' : '' }}>
                                                    16:30
                                                </option>
                                                <option
                                                    value="17:00" {{ old('Collection_Time', $collectionTime) == '17:00' ? 'selected' : '' }}>
                                                    17:00
                                                </option>
                                                <option
                                                    value="17:30" {{ old('Collection_Time', $collectionTime) == '17:30' ? 'selected' : '' }}>
                                                    17:30
                                                </option>
                                                <option
                                                    value="18:00" {{ old('Collection_Time', $collectionTime) == '18:00' ? 'selected' : '' }}>
                                                    18:00
                                                </option>
                                                <option
                                                    value="18:30" {{ old('Collection_Time', $collectionTime) == '18:30' ? 'selected' : '' }}>
                                                    18:30
                                                </option>
                                                <option
                                                    value="19:00" {{ old('Collection_Time', $collectionTime) == '19:00' ? 'selected' : '' }}>
                                                    19:00
                                                </option>
                                                <option
                                                    value="19:30" {{ old('Collection_Time', $collectionTime) == '19:30' ? 'selected' : '' }}>
                                                    19:30
                                                </option>
                                                <option
                                                    value="20:00" {{ old('Collection_Time', $collectionTime) == '20:00' ? 'selected' : '' }}>
                                                    20:00
                                                </option>
                                                <option
                                                    value="20:30" {{ old('Collection_Time', $collectionTime) == '20:30' ? 'selected' : '' }}>
                                                    20:30
                                                </option>
                                                <option
                                                    value="21:00" {{ old('Collection_Time', $collectionTime) == '21:00' ? 'selected' : '' }}>
                                                    21:00
                                                </option>
                                                <option
                                                    value="21:30" {{ old('Collection_Time', $collectionTime) == '21:30' ? 'selected' : '' }}>
                                                    21:30
                                                </option>
                                                <option
                                                    value="22:00" {{ old('Collection_Time', $collectionTime) == '22:00' ? 'selected' : '' }}>
                                                    22:00
                                                </option>
                                                <option
                                                    value="22:30" {{ old('Collection_Time', $collectionTime) == '22:30' ? 'selected' : '' }}>
                                                    22:30
                                                </option>
                                                <option
                                                    value="23:00" {{ old('Collection_Time', $collectionTime) == '23:00' ? 'selected' : '' }}>
                                                    23:00
                                                </option>
                                                <option
                                                    value="23:30" {{ old('Collection_Time', $collectionTime) == '23:30' ? 'selected' : '' }}>
                                                    23:30
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
