@extends('layouts.main')

@section('content')
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{asset('images/background/2.jpg')}}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>{{$vehicule->marque}}  {{$vehicule->modele}}</h1>
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
                        <h3>{{$vehicule->marque}}  {{$vehicule->modele}}</h3>
                        <p>
                            {!! $vehicule->description !!}
                        </p>

                        <div class="spacer-10"></div>

                        <h4>Specifications</h4>
                        <div class="de-spec">
                            <div class="d-row">
                                <span class="d-title">Type</span>
                                <spam class="d-value">{{$vehicule->type->name}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Place</span>
                                <spam class="d-value">{{$vehicule->capacite_passagers}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Portières</span>
                                <spam class="d-value">{{$vehicule->door}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Bagage</span>
                                <spam class="d-value">{{$vehicule->luggage}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Type Carburant</span>
                                <spam class="d-value">{{$vehicule->fuel_type}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Moteur</span>
                                <spam class="d-value">{{$vehicule->engine}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Annéee de fabrication</span>
                                <spam class="d-value">{{$vehicule->annee_fabrication}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Kilométrage</span>
                                <span class="d-value">{{$vehicule->mileage}}</span>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Transmission</span>
                                <span class="d-value">{{$vehicule->transmission}}</span>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Volant</span>
                                <spam class="d-value">{{$vehicule->drive}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Consommation de carburant</span>
                                <spam class="d-value">{{$vehicule->fuel_economy}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Couleur Externe</span>
                                <spam class="d-value">{{$vehicule->exterior_color}}</spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Couleur Interne</span>
                                <spam class="d-value">{{$vehicule->interior_color}}</spam>
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
                            @if($vehicule->type_reservation === 'Journalière')
                                <h3>{{ $vehicule->type->price_journalier }}$</h3>
                            @else
                                <h3>{{ $vehicule->type->price_aerot }}$</h3>
                            @endif

                        </div>
                        <div class="spacer-30"></div>
                        <div class="de-box mb25">
                            <form name="contactForm" id='contact_form' method="post">
                                <h4>Booking this car</h4>

                                <div class="spacer-20"></div>

                                <div class="row">
                                    <div class="col-lg-12 mb20">
                                        <h5>Pick Up Location</h5>
                                        <input type="text" name="PickupLocation" onfocus="geolocate()" placeholder="Enter your pickup location" id="autocomplete" autocomplete="off" class="form-control">

                                        <div class="jls-address-preview jls-address-preview--hidden">
                                            <div class="jls-address-preview__header">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb20">
                                        <h5>Drop Off Location</h5>
                                        <input type="text" name="DropoffLocation" onfocus="geolocate()" placeholder="Enter your dropoff location" id="autocomplete2" autocomplete="off" class="form-control">

                                        <div class="jls-address-preview jls-address-preview--hidden">
                                            <div class="jls-address-preview__header">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb20">
                                        <h5>Pick Up Date & Time</h5>
                                        <div class="date-time-field">
                                            <input type="text" id="date-picker" name="Pick Up Date" value="">
                                            <select name="Pick Up Time" id="pickup-time">
                                                <option selected disabled value="Select time">Time</option>
                                                <option value="00:00">00:00</option>
                                                <option value="00:30">00:30</option>
                                                <option value="01:00">01:00</option>
                                                <option value="01:30">01:30</option>
                                                <option value="02:00">02:00</option>
                                                <option value="02:30">02:30</option>
                                                <option value="03:00">03:00</option>
                                                <option value="03:30">03:30</option>
                                                <option value="04:00">04:00</option>
                                                <option value="04:30">04:30</option>
                                                <option value="05:00">05:00</option>
                                                <option value="05:30">05:30</option>
                                                <option value="06:00">06:00</option>
                                                <option value="06:30">06:30</option>
                                                <option value="07:00">07:00</option>
                                                <option value="07:30">07:30</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:30">08:30</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="12:00">12:00</option>
                                                <option value="12:30">12:30</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:30">13:30</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:30">18:30</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:30">19:30</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:30">20:30</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:30">21:30</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:30">22:30</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:30">23:30</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb20">
                                        <h5>Return Date & Time</h5>
                                        <div class="date-time-field">
                                            <input type="text" id="date-picker-2" name="Collection Date" value="">
                                            <select name="Collection Time" id="collection-time">
                                                <option selected disabled value="Select time">Time</option>
                                                <option value="00:00">00:00</option>
                                                <option value="00:30">00:30</option>
                                                <option value="01:00">01:00</option>
                                                <option value="01:30">01:30</option>
                                                <option value="02:00">02:00</option>
                                                <option value="02:30">02:30</option>
                                                <option value="03:00">03:00</option>
                                                <option value="03:30">03:30</option>
                                                <option value="04:00">04:00</option>
                                                <option value="04:30">04:30</option>
                                                <option value="05:00">05:00</option>
                                                <option value="05:30">05:30</option>
                                                <option value="06:00">06:00</option>
                                                <option value="06:30">06:30</option>
                                                <option value="07:00">07:00</option>
                                                <option value="07:30">07:30</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:30">08:30</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="12:00">12:00</option>
                                                <option value="12:30">12:30</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:30">13:30</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:30">18:30</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:30">19:30</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:30">20:30</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:30">21:30</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:30">22:30</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:30">23:30</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type='submit' id='send_message' value='Book Now' class="btn-main btn-fullwidth">

                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
