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
                        <h3>{{$vehicule->name}} x ({{ $differenceEnJours }} Jr)</h3>
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
                            Prix Initial : ${{$vehicule->type->price_journalier}} / Jr
                            <h3 class="montant-total">${{$coutTotal}}</h3>
                        </div>
                        <div class="spacer-30"></div>
                        <div class="de-box mb25">
                            <form method="POST" action="{{ route('vehicules.reservations') }}">
                                @csrf
                                <h4>Réservation du véhicule</h4>
                                <div class="spacer-20"></div>
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
