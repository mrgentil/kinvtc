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
                                            <h4>{{$vehicule->name}}</h4>
                                            <div class="d-atr-group">
                                                <ul class="d-atr">
                                                    <li><span>Places:</span>{{$vehicule->capacite_passagers}}</li>
                                                    <li><span>Volant:</span>{{$vehicule->drive}}</li>
                                                    <li><span>Type:</span>{{$vehicule->type->name}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-price">
                                        Tarif
                                        <span>{{ $vehicule->type->price_journalier }}$</span>
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
