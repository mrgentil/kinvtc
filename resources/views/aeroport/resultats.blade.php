@extends('layouts.main') <!-- Si vous utilisez une mise en page -->

@section('content')
    <!-- content begin -->
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{asset('images/background/subheader.jpg')}}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Choisissez un vehicule</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-hero" aria-label="section" class="no-top mt-80 sm-mt-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 ">
                        <div class="spacer-single sm-hide"></div>
                        <div class="p-4 rounded-3 shadow-soft" data-bgcolor="#ffffff">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <h4>Détails sur les horaires de la réservation</h4>
                                    <hr>
                                    <h5 id="commune-details">Commune : {{$communeName}}</h5>
                                    <h5 id="dropoff-location">Destination : {{$dropoffLocation}}</h5>
                                    <h5 id="pick-up-details">Date et heure de début
                                        : {{ \Carbon\Carbon::parse(session('pickUpDate', $pickUpDate))->format('j F, Y') }}
                                        à {{ session('pickUpTime', $pickUpTime) }}</h5>
                                    <h5 id="aller-retour-details">Aller/Retour : {{ $roundTrip ? 'Oui' : 'Non' }}</h5>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <h4>Modifier les horaires de reservation <i class="fa-light fa fa-edit"></i></h4>
                                    <form id="contact_form" method="POST" action="{{ route('vehicules-aeroport') }}">
                                        @csrf
                                        <div class="spacer-20"></div>
                                        <div class="row">
                                            <div class="col-lg-12 mb20">
                                                <h5>Commune</h5>
                                                <select name="commune_id" id="commune_id-input"
                                                        class="js-example-basic-multiple js-states form-control">
                                                    @foreach($allCommunes as $commune)
                                                        @php
                                                            $selected = $commune->name == $communeName ? 'selected' : '';
                                                        @endphp
                                                        <option value="{{ $commune->id }}" {{ $selected }}>
                                                            {{ $commune->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('commune_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb20">
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
                                            <div class="col-lg-6 mb20">
                                                <h5> Aller/Retour </h5>
                                                <input type="checkbox" name="roundTrip" id="roundTrip" class="custom-checkbox" {{ $roundTrip ? 'checked' : '' }}>
                                                <label for="roundTrip" class="custom-label"> </label>
                                            </div>

                                        </div>
                                        <button type="submit" id="btn-modifier" name="reserve_jour"
                                                value="Reserver" class="btn-main pull-right">Modifier
                                        </button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="section-cars">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="item_filter_group">
                            <h4>Price ($)</h4>
                            <div class="price-input">
                                <div class="field">
                                    <span>Min</span>
                                    <input type="number" class="input-min" value="0">
                                </div>
                                <div class="field">
                                    <span>Max</span>
                                    <input type="number" class="input-max" value="2000">
                                </div>
                            </div>
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min" min="0" max="2000" value="0" step="1">
                                <input type="range" class="range-max" min="0" max="2000" value="2000" step="1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            @if($vehiculesAeroport && $vehiculesAeroport->count() > 0)
                                @foreach($vehiculesAeroport as $vehicule)
                                    <div class="col-lg-12">
                                        <div class="de-item-list mb30">
                                            <div class="d-img">
                                                <img src="{{ Voyager::Image($vehicule->image_cover) }}"
                                                     class="img-fluid" alt="{{ $vehicule->name }}">
                                            </div>
                                            <div class="d-info">
                                                <div class="d-text">
                                                    <h4>{{ $vehicule->name }}</h4>
                                                </div>
                                                <div class="d-atr-group">
                                                    <ul class="d-atr">
                                                        <li><span>1 jour :</span>15000km</li>
                                                        <li>
                                                            <span>Sièges:</span>{{ $vehicule->capacite_passagers}}
                                                        </li>
                                                        <li>
                                                            <span>Couleur Externe:</span>{{ $vehicule->exterior_color}}
                                                        </li>
                                                        <li>
                                                            <span>Couleur Externe:</span>{{ $vehicule->interior_color}}
                                                        </li>
                                                        <li>
                                                            <span>Kilometrage:</span>{{ $vehicule->kilometrage}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="d-price">
                                                Prix Initial : ${{ $vehicule->price }}

                                                @if ($roundTrip) <!-- Vérifiez si Aller/Retour est coché -->
                                                <!-- Calculer le nouveau prix ici, par exemple en multipliant par 2 -->
                                                    <?php $newPrice = $vehicule->price * 2; ?>
                                                <span>Prix Aller/Retour : ${{ $newPrice }}</span>
                                                @endif

                                                <!-- Autres détails du prix -->
                                                <a class="btn-main" href="{{ route('vehicules-aeroport.show', [
                            'id' => $vehicule->id,
                            'commune_id' => $commune,
                            'dropoffLocation' => $dropoffLocation,
                            'pickUpTime' => $pickUpTime,
                            'pickUpDate' => $pickUpDate,
                            'price' => isset($newPrice) ? $newPrice : $vehicule->price
                        ]) }}">Louer maintenant</a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @endforeach
                            @else
                                <p>Aucun véhicule aéroport n'est disponible pour cette commune.</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->
@endsection
