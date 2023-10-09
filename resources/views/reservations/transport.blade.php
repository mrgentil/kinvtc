@extends('layouts.main')

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
                            <h1>Réservez pour un transfert aéroport simplifiés</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-hero" aria-label="section" class="no-top mt-80 sm-mt-0">
            <div class="container">
                <div class="spacer-single"></div>
                <div class="row">
                    <div class="col-md-3  wow fadeInRight" data-wow-delay=".2s" >
                        <div class="feature-box h-100 p-2 style-4 text-center">
                            <a href="#"><i class="bg-color text-light i-boxed fa fa-car"></i></a>
                            <div class="text">
                                <a href="#"><h4>Choose a vehicle</h4></a>
                                Unlock unparalleled adventures and memorable journeys with our vast fleet of vehicles tailored to suit every need, taste, and destination.
                            </div>
                            <span class="wm">1</span>
                        </div>
                    </div>
                    <div class="col-md-3  wow fadeInRight" data-wow-delay=".4s" >
                        <div class="feature-box h-100 p-2 style-4 text-center">
                            <a href="#"><i class="bg-color text-light i-boxed fa fa-calendar"></i></a>
                            <div class="text">
                                <a href="#"><h4>Pick location &amp; date</h4></a>
                                Pick your ideal location and date, and let us take you on a journey filled with convenience, flexibility, and unforgettable experiences.
                            </div>
                            <span class="wm">2</span>
                        </div>
                    </div>

                    <div class="col-md-3  wow fadeInRight" data-wow-delay=".6s" >
                        <div class="feature-box h-100 p-2 style-4 text-center">
                            <a href="#"><i class="bg-color text-light i-boxed fa fa-pencil-square-o"></i></a>
                            <div class="text">
                                <a href="#"><h4>Make a booking</h4></a>
                                Secure your reservation with ease, unlocking a world of possibilities and embarking on your next adventure with confidence.
                            </div>
                            <span class="wm">3</span>
                        </div>
                    </div>

                    <div class="col-md-3  wow fadeInRight" data-wow-delay=".6s" >
                        <div class="feature-box h-100 p-2 style-4 text-center">
                            <a href="#"><i class="bg-color text-light i-boxed fa fa-smile-o"></i></a>
                            <div class="text">
                                <a href="#"><h4>Sit back & relax</h4></a>
                                Hassle-free convenience as we take care of every detail, allowing you to unwind and embrace a journey filled comfort.
                            </div>
                            <span class="wm">3</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-cars">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach($vehiculesTransport as $vehicule)
                                <div class="col-lg-12">
                                    <div class="de-item-list mb30">
                                        <div class="d-img">
                                            <img src="{{Voyager::image($vehicule->image_cover)}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="d-info">
                                            <div class="d-text">
                                                <h4>{{$vehicule->marque}} {{$vehicule->modele}}</h4>
                                                <div class="d-atr-group">
                                                    <ul class="d-atr">
                                                        <li><span>Places:</span>{{$vehicule->capacite_passagers}}</li>
                                                        <li><span>Bagages:</span>{{$vehicule->luggage}}</li>
                                                        <li><span>Portes:</span>{{$vehicule->door}}</li>
                                                        <li><span>Carburant:</span>{{$vehicule->fuel_type}}</li>
                                                        <li><span>Moteur:</span>{{$vehicule->engine}}</li>
                                                        <li><span>Volant:</span>{{$vehicule->drive}}</li>
                                                        <li><span>Type:</span>{{$vehicule->type->name}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-price">
                                            Tarif
                                            @if($vehicule->type_reservation === 'Journalière')
                                                <span>{{ $vehicule->type->price_journalier }}$</span>
                                            @else
                                                <span>{{ $vehicule->type->price_aerot }}$</span>
                                            @endif
                                            <a class="btn-main" href="{{ $vehicule->slug_link }}">Voir +</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="post-navigation-wrap">
                                        <nav>
                                            <ul class="pagination">
                                                {{ $vehiculesTransport->links('pagination.bootstrap') }}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="position-relative d-flex bottom-20">
            @foreach($typesDeVehicules as $item)
            <div class="de-marquee-list d-marquee-small">
                <div class="d-item">
                    <span class="d-item-txt">{{$item->name}}</span>
                    <span class="d-item-display">
                    <i class="d-item-dot"></i>
                    </span>


                </div>
            </div>

            <div class="de-marquee-list d-marquee-small">
                <div class="d-item">
                    <span class="d-item-txt">{{$item->name}}</span>
                    <span class="d-item-display">
                    <i class="d-item-dot"></i>
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- content close -->
@endsection
