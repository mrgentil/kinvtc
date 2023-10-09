@extends('layouts.main')

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
                            <h1>Nos Véhicules</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-cars">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach($vehicules as $vehicule)
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
                                            {{ $vehicules->links('pagination.bootstrap') }}
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


    </div>
    <!-- content close --
@endsection
