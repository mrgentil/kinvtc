@extends('layouts.main')

@section('content')
    <!-- content begin -->
    <div class="no-bottom no-top " id="content">
        <div id="top"></div>
        <section id="section-hero" aria-label="section" class="jarallax no-top no-bottom" style="background-image: url({{asset('images/slider/4.jpg')}}); background-size: cover; background-repeat: no-repeat; background-color: black">
            <div class="overlay-bg no-top no-bottom">
                <div class="v-center">
                    <div class="container position-relative z1000">
                        <div class="spacer-double d-lg-none d-sm-block"></div>
                        <div class="spacer-double d-lg-none d-sm-block"></div>
                        <div class="spacer-double d-lg-none d-sm-block"></div>
                        <div class="row align-items-center">
                            <div class="col-lg-6 text-light">
                                <h4><span class="id-color">Louer un véhicule de façon simple et rapide</span></h4>
                                <div class="spacer-10 d-none d-md-block d-lg-block"></div>
                                <h1 class="mb-2 d-none d-md-block d-lg-block">Explorer Kinshasa avec un véhicule confortable</h1>
                                <div class="spacer-10 d-none d-md-block d-lg-block"></div>
                                <p class="lead d-none d-md-block d-lg-block">Embarquez pour des aventures inoubliables et découvrez Kinshasa dans un confort et un style inégalés grâce à notre flotte de voitures exceptionnellement confortables.</p>
                            </div>

                            <div class="col-lg-6">
                                <div class="spacer-single sm-hide"></div>
                                <div class="p-4 rounded-3 shadow-soft text-light" data-bgcolor="rgba(0, 0, 0, .6)">
                                    <form action="/vehicules" method="POST">
                                        @csrf
                                        <div class="spacer-20"></div>
                                        <div class="row">
                                            <div class="col-lg-12 mb20">
                                                <h5>Lieu d'embarquement</h5>
                                                <input type="text" name="pickupLocation" placeholder="Entrez votre lieu d'embarquement" id="autocomplete" autocomplete="off" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 mb20">
                                                <h5>Date et heure de début</h5>
                                                <div class="date-time-field">
                                                    <input type="text" id="date-picker" name="pickUpDate" value="" required>
                                                    <select name="pickUpTime" required>
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

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb20">
                                                <h5>Date et heure de retour</h5>
                                                <div class="date-time-field">
                                                    <input type="text" id="date-picker-2" name="collectionDate" value="" required>
                                                    <select name="collectionTime" required>
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
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <button name="reserve_jour" type="submit" id="send_message" value="Reserver" class="btn-main pull-right">Trouver</button>

                                        <div class="clearfix"></div>
                                    </form>

                                </div>
                            </div>

                        </div>
                        <!-- <div class="spacer-double d-lg-none d-sm-block"></div>
                        <div class="spacer-double d-lg-none d-sm-block"></div> -->

                    </div>

                    <!-- <div class="position-absolute d-flex bottom-20">
                        <div class="de-marquee-list d-marquee-small">
                        <div class="d-item">
                            <span class="d-item-txt">SUV</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>
                            <span class="d-item-txt">Sedan</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>
                            <span class="d-item-txt">Pick-up</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>
                            <span class="d-item-txt">Compacts</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>
                            <span class="d-item-txt">Minivans</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>
                            <span class="d-item-txt">Bus</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>

                            </div>
                        </div>

                        <div class="de-marquee-list d-marquee-small">
                            <div class="d-item">
                            <span class="d-item-txt">SUV</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>
                            <span class="d-item-txt">Sedan</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>
                            <span class="d-item-txt">Pick-up</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>
                            <span class="d-item-txt">Compacts</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>
                            <span class="d-item-txt">Minivans</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>
                            <span class="d-item-txt">Bus</span>
                            <span class="d-item-display">
                            <i class="d-item-dot"></i>
                            </span>

                            </div>
                        </div>
                    </div> -->
                </div>

            </div>

        </section>
        <section id="section-news" style="background-color: #f8f8f8">
            <div class="container">
                <div class="row align-items-center mx-auto">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h2>Nos Services</h2>
                        <!-- <p>Breaking news, fresh perspectives, and in-depth coverage - stay ahead with our latest news, insights, and analysis.</p> -->
                        <div class="spacer-20"></div>
                    </div>

                    <div class="col-lg-6 mb10">
                        <div class="bloglist s2 item h-100">
                            <div class="post-content">
                                <div class="post-image">
                                    <!-- <div class="date-box">
                                        <div class="m">10</div>
                                        <div class="d">MAR</div>
                                    </div> -->
                                    <img alt="" src="images/slider/1.jpg" class="lazy" >
                                </div>
                                <div class="post-image mt-1 h-100 col-12"  >

                                    <h5><a href="service1.php">Location des vehicules<span></span></a></h5>
                                    <p style="font-size: 12px;">Un service qui vous permet de bénéficier d'un transport confortable, sécurisé et personnalisé. Que ce soit pour un déplacement professionnel, un événement privé ou une visite touristique, vous pouvez choisir le véhicule  qui correspondent à vos besoins et à votre budget. Vous n'avez pas à vous soucier de la conduite, du stationnement ou de l'itinéraire, vous profitez simplement de votre trajet en toute sérénité.</p>
                                    <a class="btn-main mb-2" href="service1.php">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb10">
                        <div class="bloglist s2 item h-100">
                            <div class="post-content">
                                <div class="post-image ">
                                    <!-- <div class="date-box">
                                        <div class="m">10</div>
                                        <div class="d">MAR</div>
                                    </div> -->
                                    <img alt="" src="images/slider/3.jpg" class="laz" >
                                </div>
                                <div class="post-image mt-1 h-100 col-12" >
                                    <h5><a href="service2.php">Transfert Aéroport<span></span></a></h5>
                                    <p style="font-size: 12px;">Un moyen rapide, confortable et économique vous permettant de vous rendre à votre destination depuis l'aéroport ou vice versa. Un service de transfert d'aéroport personnalisé et adapté à vos besoins. Que vous voyagiez seul, en famille ou en groupe, nous avons le véhicule qu'il vous faut. Juste reservant en ligne et profitez d'un accueil chaleureux, d'un chauffeur professionnel et d'un trajet sans stress.</p>
                                    <a class="btn-main mb-2" href="service2.php">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <section id="section-cars">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h2>Notre flotte de véhicules</h2>
                        <p>Conduisez vos rêves vers la réalité avec une flotte exquise de véhicules polyvalents pour des voyages inoubliables avec un chauffeur à bord.</p>
                        <div class="spacer-20"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="items-carousel" class="owl-carousel wow fadeIn">
                        @foreach($vehicules as $vehicule)
                        <div class="col-lg-12">
                            <div class="de-item mb30">
                                <h4>{{$vehicule->name}} </h4><span class="d-atr"><img src="images/icons/4.svg" alt="">{{$vehicule->type->name}}</span>
                                <div class="d-img">
                                    <img src="{{Voyager::image($vehicule->image_cover)}}" class="img-fluid" alt="" style="height: 240px;">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <!-- <div class="d-item_like">
                                            <i class="fa fa-heart"></i><span>74</span>
                                        </div> -->
                                        <div class="d-atr-group">
                                            <span class="d-atr"><img src="images/icons/1.svg" alt="">{{$vehicule->capacite_passagers}}</span>
                                            <span class="d-atr"><img src="images/icons/2.svg" alt="">4</span>
                                            <span class="d-atr"><img src="images/icons/3.svg" alt="">4</span>
                                            <span class="d-atr"><i class="fa fa-dashboard"></i>150 Km</span>

                                        </div>
                                        <br>
                                        <div class="d-price">
                                            <span>${{ $vehicule->type->price_journalier }} Jour</span>
                                            <a class="btn-main" href="{{ $vehicule->slug_link }}">Voir +</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

        <section class="text-light jarallax">
            <img src="images/background/2.jpg" class="jarallax-img" alt="">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-12 wow fadeInRight">
                        <h4>Nous proposons une large gamme de véhicules <span class="id-color"> utilitaires</span> et <span class="id-color">luxueux </span> pour toutes les occasions.</h4>
                    </div>
                    <div class="col-lg-12 wow fadeInLeft" >
                        Chez nous, vous trouverez la voiture de location qui vous convient, que vous voyagiez pour le travail ou pour le plaisir. Nous vous proposons une large gamme de véhicules de qualité, du plus économique au plus luxueux, à des tarifs attractifs. Vous pouvez réserver en ligne en quelques clics et profiter de notre service rapide et efficace. Nous vous offrons la possibilité de louer une voiture pour une courte ou une longue durée, selon vos besoins. Que ce soit pour un déplacement professionnel à Kinshasa, des vacances en famille ou une escapade le temps d'un week-end, nous avons la solution de location qui vous correspond.
                    </div>
                </div>
                <div class="spacer-double"></div>
                <div class="row text-center mx-auto">
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="45" data-speed="3000">0</h3>
                            Vehicules
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="57" data-speed="3000">0</h3>
                            Clients pris en charge
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="235" data-speed="3000">0</h3>
                            Rerservations
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count transparent text-light wow fadeInUp">
                            <h3 class="timer" data-to="5" data-speed="3000">0</h3>
                            Années d'expérience
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row"><div class="col text-center">
                        <h2>Nos fonctionnalités</h2>
                        <p>Découvrez un monde de commodité, de sécurité et de personnalisation, ouvrant la voie à des aventures inoubliables et à des solutions de mobilité sans faille.</p>
                        <div class="spacer-20"></div>
                        <div class="spacer-20"></div>
                    </div></div>

                <div class="row">
                    <div class="col-md-3">
                        <i class="fa fa-trophy de-icon mb20"></i>
                        <h4>Des services de première classe</h4>
                        <p>Là où le luxe rencontre un soin exceptionnel, créant des moments inoubliables et dépassant toutes vos attentes.</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-road de-icon mb20"></i>
                        <h4>Assistance routière 24h/24, 7j/7</h4>
                        <p>  Une assistance fiable lorsque vous en avez le plus besoin, vous permettant de vous déplacer en toute confiance et en toute tranquillité d'esprit.</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-tag de-icon mb20"></i>
                        <h4>Qualité à moindre coût</h4>
                        <p>Débloquer une brillance abordable en élevant la qualité tout en minimisant les coûts pour une valeur maximale.</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-money de-icon mb20"></i>
                        <h4>Prix Fixe </h4>
                        <p>Pour tous les trajets réservés à l'avance le prix est fixé au moment de la réservation.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section aria-label="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h2>Nos fonctionnalités</h2>
                        <p>Découvrez un monde de commodité, de sécurité et de personnalisation, ouvrant la voie à des aventures inoubliables et à des solutions de mobilité sans faille.</p>
                        <div class="spacer-20"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-3">
                        <div class="box-icon s2 p-small mb20 wow fadeInRight" data-wow-delay=".5s">
                            <i class="fa bg-color fa-trophy"></i>
                            <div class="d-inner">
                                <h4>Des services de première classe</h4>
                                Là où le luxe rencontre un soin exceptionnel, créant des moments inoubliables et dépassant toutes vos attentes.
                            </div>
                        </div>
                        <div class="box-icon s2 p-small mb20 wow fadeInL fadeInRight" data-wow-delay=".75s">
                            <i class="fa bg-color fa-road"></i>
                            <div class="d-inner">
                                <h4>Assistance routière 24h/24, 7j/7</h4>
                                Une assistance fiable lorsque vous en avez le plus besoin, vous permettant de vous déplacer en toute confiance et en toute tranquillité d'esprit.
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <img src="images/misc/car.png" alt="" class="img-fluid wow fadeInUp">
                    </div>

                    <div class="col-lg-3">
                        <div class="box-icon s2 d-invert p-small mb20 wow fadeInL fadeInLeft" data-wow-delay="1s">
                            <i class="fa bg-color fa-tag"></i>
                            <div class="d-inner">
                                <h4>Qualité à moindre coût</h4>
                                Débloquer une brillance abordable en élevant la qualité tout en minimisant les coûts pour une valeur maximale.
                            </div>
                        </div>
                        <div class="box-icon s2 d-invert p-small mb20 wow fadeInL fadeInLeft" data-wow-delay="1.25s">
                            <i class="fa bg-color fa-map-pin"></i>
                            <div class="d-inner">
                                <h4>Free Pick-Up </h4>
                                    Enjoy free pickup and drop-off services, adding an extra layer of ease to your car rental experience.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section id="section-img-with-tab" class="bg-dark text-light d-none d-md-block d-lg-block d-xl-block d-sm-none" style="background-image: url(images/background/14.jpg); background-size: cover;">
            <div class="container">
                <div class="row">

                    <div class="col-8 wow pull-right">
                        <h3>NOS VALEURS ET ENGAGEMENTS FONDAMENTAUX</h3>
                        <div class="spacer-20"></div>

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Professionnalisme</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Ponctualité</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Convivialité</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Discrétion</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><p>Une équipe de professionnels mise à votre service pour répondre à chaque instant à vos besoins en passant par l'accueil et la réception de vos réservations.</p></div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><p>Nous accordons une grande importance à la sécurité et au bien-être de nos chauffeurs. Nous nous assurons qu'ils respectent les règles de conduite et qu'ils disposent du matériel nécessaire pour effectuer leur travail dans les meilleures conditions. Nous nous engageons également à respecter les horaires convenus avec nos clients. La ponctualité est l'une de nos valeurs les plus appréciées, car elle témoigne de notre professionnalisme et de notre souci de vous offrir un service de qualité.</p></div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><p>Notre équipe de chauffeurs professionnels vous reçoit avec respect et courtoisie. Ils s'efforcent de vous fournir un service de qualité qui répond à vos besoins et à vos attentes.</p></div>
                            <div class="tab-pane fade" id="pills" role="tabpanel" aria-labelledby="pills-contact-tab"><p>Nous veillons à ce que nos chauffeurs soient le plus discrets possible lors de vos déplacements, afin de respecter votre intimité et votre confort. Que vous voyagiez pour affaires ou pour le plaisir, vous pouvez compter sur notre service de qualité et notre discrétion professionnelle. Nous vous conduisons à destination en toute sécurité et en toute sérénité.</p></div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- <div class="image-container col-md-6 pull-right" data-bgimage="url(images/misc/e1.jpg) center"></div> -->
        </section>

        <!-- <section id="section-news">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h2>Latest News</h2>
                        <p>Breaking news, fresh perspectives, and in-depth coverage - stay ahead with our latest news, insights, and analysis.</p>
                        <div class="spacer-20"></div>
                    </div>

                    <div class="col-lg-4 mb10">
                        <div class="bloglist s2 item">
                            <div class="post-content">
                                <div class="post-image">
                                    <div class="date-box">
                                        <div class="m">10</div>
                                        <div class="d">MAR</div>
                                    </div>
                                    <img alt="" src="images/news/pic-blog-1.jpg" class="lazy">
                                </div>
                                <div class="post-text">
                                    <h4><a href="news-single.html">Enjoy Best Travel Experience<span></span></a></h4>
                                    <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut enim reprehenderit cupidatat labore ad laborum consectetur.</p>
                                    <a class="btn-main" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb10">
                        <div class="bloglist s2 item">
                            <div class="post-content">
                                <div class="post-image">
                                    <div class="date-box">
                                        <div class="m">12</div>
                                        <div class="d">MAR</div>
                                    </div>
                                    <img alt="" src="images/news/pic-blog-2.jpg" class="lazy">
                                </div>
                                <div class="post-text">
                                    <h4><a href="news-single.html">The Future of Car Rent<span></span></a></h4>
                                    <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut enim reprehenderit cupidatat labore ad laborum consectetur.</p>
                                    <a class="btn-main" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb10">
                        <div class="bloglist s2 item">
                            <div class="post-content">
                                <div class="post-image">
                                    <div class="date-box">
                                        <div class="m">14</div>
                                        <div class="d">MAR</div>
                                    </div>
                                    <img alt="" src="images/news/pic-blog-3.jpg" class="lazy">
                                </div>
                                <div class="post-text">
                                    <h4><a href="news-single.html">Holiday Tips For Backpacker<span></span></a></h4>
                                    <p>Dolore officia sint incididunt non excepteur ea mollit commodo ut enim reprehenderit cupidatat labore ad laborum consectetur.</p>
                                    <a class="btn-main" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- <section id="section-testimonials" class="no-top no-bottom">
            <div class="container-fluid">
                <div class="row g-0 align-items-center">

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    I have been using Rentaly for my Car Rental needs for over 5 years now. I have never had any problems with their service. Their customer support is always responsive and helpful. I would recommend Rentaly to anyone looking for a reliable Car Rental provider.
                                    <span class="by">Stepanie Hutchkiss</span>
                                </blockquote>
                            </div>
                            <img src="images/testimonial/1.jpg" class="img-fluid" alt="">
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    We have been using Rentaly for our trips needs for several years now and have always been happy with their service. Their customer support is Excellent Service! and they are always available to help with any issues we have. Their prices are also very competitive.
                                    <span class="by">Jovan Reels</span>
                                </blockquote>
                            </div>
                            <img src="images/testimonial/2.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    Endorsed by industry experts, Rentaly is the Car Rental solution you can trust. With years of experience in the field, we provide fast, reliable and secure Car Rental services.
                                    <span class="by">Kanesha Keyton</span>
                                </blockquote>
                            </div>
                            <img src="images/testimonial/3.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section> -->

        <!-- <section id="section-faq">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Have Any Questions?</h2>
                        <div class="spacer-20"></div>
                    </div>
                </div>
                <div class="row g-custom-x">
                    <div class="col-md-6 wow fadeInUp">
                        <div class="accordion secondary">
                            <div class="accordion-section">
                                <div class="accordion-section-title" data-tab="#accordion-1">
                                    How do I get started with Car Rental?
                                </div>
                                <div class="accordion-section-content" id="accordion-1">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-2">
                                    What is difference for each plan?
                                </div>
                                <div class="accordion-section-content" id="accordion-2">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-3">
                                    What kind of Car Rental do I need?
                                </div>
                                <div class="accordion-section-content" id="accordion-3">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 wow fadeInUp">
                        <div class="accordion secondary">
                            <div class="accordion-section">
                                <div class="accordion-section-title" data-tab="#accordion-b-4">
                                    Why do I need domain name?
                                </div>
                                <div class="accordion-section-content" id="accordion-b-4">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-b-5">
                                    What my website protected from hackers?
                                </div>
                                <div class="accordion-section-content" id="accordion-b-5">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                                <div class="accordion-section-title" data-tab="#accordion-b-6">
                                    How do I backup my website?
                                </div>
                                <div class="accordion-section-content" id="accordion-b-6">
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section id="section-call-to-action" class="bg-color-2 pt60 pb60 text-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-1">
                        <h3 class="s2">Appelez-nous pour plus d'informations. Le service clientèle de KinVTC est là pour vous aider à tout moment.</h3>
                    </div>

                    <div class="col-lg-5 text-lg-center text-sm-center">
                        <div class="phone-num-big">
                            <i class="fa fa-phone"></i>
                            <span class="pnb-text">
                        Appelez-nous maintenant
                        </span>
                            <span class="pnb-num">
                            <a class="text-white fs-4" href="tel:00243841211267">+243 841 211 267</a>
                        </span>
                        </div>
                        <a href="#" class="btn-main">Nous contacter</a>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
