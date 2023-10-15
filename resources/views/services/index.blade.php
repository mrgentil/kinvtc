@extends('layouts.main')

@section('content')
    <section id="section-hero" aria-label="section" class="jarallax no-top no-bottom" style="background-image: url(images/slider/4.jpg); background-size: cover; background-repeat: no-repeat; background-color: black">
        <div class="overlay-bg no-top no-bottom">
            <div class="v-center">
                <div class="container position-relative z1000">
                    <div class="spacer-double d-lg-none d-sm-block"></div>
                    <div class="spacer-double d-lg-none d-sm-block"></div>
                    <div class="spacer-double d-lg-none d-sm-block"></div>
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-light">
                            <h4><span class="id-color">Louer un véhicule de façon simple et rapide</span></h4>
                            <div class="spacer-10"></div>
                            <h1 class="mb-2">Explorer Kinshasa avec un véhicule confortable</h1>
                            <div class="spacer-10"></div>
                            <p class="lead">Embarquez pour des aventures inoubliables et découvrez Kinshasa dans un confort et un style inégalés grâce à notre flotte de voitures exceptionnellement confortables.</p>
                        </div>

                        <div class="col-lg-6">
                            <div class="spacer-single sm-hide"></div>
                            <div class="p-4 rounded-3 shadow-soft text-light" data-bgcolor="rgba(0, 0, 0, .6)">


                                <form name="contactForm" id='contact_form' method="post">
                                    <!-- <h5>Quel est votre type de véhicule ?</h5>

                                    <div class="de_form de_radio row g-3">
                                        <div class="radio-img col-lg-2 col-sm-2 col-6">
                                            <input id="radio-1a" name="Car_Type" type="radio" value="Residential" checked="checked">
                                            <label style="font-size: 10px;" for="radio-1a"><img src="images/car_icon/berline.png" alt="">Berline</label>
                                        </div>

                                        <div class="radio-img col-lg-2 col-sm-2 col-6">
                                            <input id="radio-1b" name="Car_Type" type="radio" value="Office">
                                            <label style="font-size: 10px;" for="radio-1b"><img src="images/car_icon/suv.png" alt="">SUV</label>
                                        </div>

                                        <div class="radio-img col-lg-2 col-sm-2 col-6">
                                            <input id="radio-1c" name="Car_Type" type="radio" value="Commercial">
                                            <label style="font-size: 10px;" for="radio-1c"><img src="images/car_icon/compact.png" alt="">Compact</label>
                                        </div>

                                        <div class="radio-img col-lg-2 col-sm-2 col-6">
                                            <input id="radio-1d" name="Car_Type" type="radio" value="Retail">
                                            <label style="font-size: 10px;" for="radio-1d"><img src="images/car_icon/pickup-2.png" alt="">Pick-Up</label>
                                        </div>
                                        <div class="radio-img col-lg-2 col-sm-2 col-6">
                                            <input id="radio-1e" name="Car_Type" type="radio" value="Commercial">
                                            <label style="font-size: 10px;" for="radio-1e"><img src="images/car_icon/van.png" alt="">Van</label>
                                        </div>

                                        <div class="radio-img col-lg-2 col-sm-2 col-6">
                                            <input id="radio-1f" name="Car_Type" type="radio" value="Retail">
                                            <label style="font-size: 10px;" for="radio-1f"><img src="images/car_icon/bus.png" alt="">Bus</label>
                                        </div>
                                    </div> -->

                                    <div class="spacer-20"></div>

                                    <div class="row">
                                        <div class="col-lg-6 mb20">
                                            <h5>Lieu d'embarquement</h5>
                                            <input type="text" name="PickupLocation" onfocus="geolocate()" placeholder="Enter your pickup location" id="autocomplete" autocomplete="off" class="form-control">

                                            <div class="jls-address-preview jls-address-preview--hidden">
                                                <div class="jls-address-preview__header">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb20">
                                            <h5>Point d'arriver</h5>
                                            <input type="text" name="DropoffLocation" onfocus="geolocate()" placeholder="Enter your dropoff location" id="autocomplete2" autocomplete="off" class="form-control">

                                            <div class="jls-address-preview jls-address-preview--hidden">
                                                <div class="jls-address-preview__header">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb20">
                                            <h5>Date et heure de début</h5>
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

                                        <div class="col-lg-6 mb20">
                                            <h5>Date et heure de retour</h5>
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

                                    <input type='submit' id='send_message' value='Reserver' class="btn-main pull-right">

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
    <!-- section close -->
    <!-- section begin -->
    <section aria-label="section">
        <div class="container">
            <div class="row g-5">
                <!-- <div class="col-lg-6 wow fadeInRight" style="background-image: url(images/misc/car.png);">

                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".25s">
                    <h3>LOCATION DES VÉHICULES AVEC CHAUFFEUR CHEZ  KIN VTC</h3>
                <p style="text-align: justify;">Il n'y a pas de mauvaise surprise avec KIN VTC. Nos tarifs compétitifs, garantis lors de la réservation, comprennent  toutes les taxes et frais.
                <br><br>Si vos plans changent ! Pas de panique, vous pouvez annuler ou modifier gratuitement jusqu'à 24 heures avant le début de votre location.</p>
                <br><br><h3>POURQUOI OPTER POUR UNE LOCATION JOURNALIÈRE ?</h3>
                <p style="text-align: justify;">Vos rendez-vous professionnels ou personnels se déroulent la même journée ou plusieurs jours aux différentes adresses ! Vous cherchez une solution flexible, confortable et sur-mesure pour vous déplacer.

                Notre service de location permet de gérer tous types d'événements, des plus habituels aux plus mémorables. Vous souhaitez consacrer une journée pour visiter un lieu touristique, un parc d'attractions ou faire du shopping, un mariage ou une soirée d’anniversaire entre amis ou en famille. Vos événements commerciaux et marketing.

                Notre service de location est là pour répondre à toutes vos attentes
                </p>
                </div> -->
                <!-- <div class="col-lg-6 wow fadeInRight" data-wow-delay=".25s" style="background-image: url(images/misc/car.png);">

                </div> -->
                <div class="col-lg-12 wow fadeInRight text-center " data-wow-delay=".25s">
                    <h3>LOCATION DES VÉHICULES AVEC CHAUFFEUR CHEZ  KIN VTC</h3>
                    <p style="text-align: center;">Il n'y a pas de mauvaise surprise avec KIN VTC. Nos tarifs compétitifs, garantis lors de la réservation, comprennent  toutes les taxes et frais.
                        Si vos plans changent ! Pas de panique, vous pouvez annuler ou modifier gratuitement jusqu'à 24 heures avant le début de votre location.</p>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".25s" >
                    <br><br><h3>POURQUOI OPTER POUR UNE LOCATION JOURNALIÈRE ?</h3>
                    <p style="text-align: justify;">Vos rendez-vous professionnels ou personnels se déroulent la même journée ou plusieurs jours aux différentes adresses ! Vous cherchez une solution flexible, confortable et sur-mesure pour vous déplacer.

                        Notre service de location permet de gérer tous types d'événements, des plus habituels aux plus mémorables. Vous souhaitez consacrer une journée pour visiter un lieu touristique, un parc d'attractions ou faire du shopping, un mariage ou une soirée d’anniversaire entre amis ou en famille. Vos événements commerciaux et marketing.

                        Notre service de location est là pour répondre à toutes vos attentes
                    </p>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".25s" style="background-image: url(images/misc/car-2.png);">

                </div>
            </div>
            <!-- <div class="spacer-double"></div>
            <div class="row text-center">
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="15425" data-speed="3000">0</h3>
                        Hours of Work
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="8745" data-speed="3000">0</h3>
                        Clients Supported
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="235" data-speed="3000">0</h3>
                        Awards Winning
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="15" data-speed="3000">0</h3>
                        Years Experience
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <section id="section-img-with-tab" class="bg-light text-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 offset-lg-7">

                    <h3>LES ATOUTS  POUR VOTRE LOCATION</h3>
                    <div class="spacer-20"></div>

                    <p style="text-align: justify;">Le fait de disposer d'un chauffeur  pour une certaine durée de temps vous permet de bénéficier de davantage de liberté pour créer des plans plus fluides lorsque vous préparez votre voyage. Que vous voyagiez pour affaires ou pour le plaisir, une location journalière vous donne la possibilité de changer de destination sur un coup de tête et de ne pas laisser les éventuels problèmes ou obstacles gâcher votre journée.

                        <br><br>Pourquoi choisir KIN VTC pour louer votre Véhicule ? Les motifs sont nombreux. Il y a tout d'abord le service. Mais outre le professionnalisme et la serviabilité de notre personnel, il y a le rapport qualité-prix : chez KIN VTC, vous prendrez le volant d'un SUV récent des plus grands constructeurs automobiles (BMW, Audi, Lexus, Nissan, etc.) , et à des tarifs parmi les plus compétitifs du marché. Enfin, il y a le choix : du Berline compact urbain au SUV routier familial en passant par le 4x4 habile sur tous les terrains, vous trouverez sans aucun doute chaussure à votre pied parmi notre large                                                                                                                                        gamme. À titre d'exemple, nous proposons une dizaine de catégories de véhicules.

                        <br><br>Il n'y a pas de mauvaise surprise avec KIN VTC. Nos tarifs compétitifs, garantis lors de la réservation, comprennent
                        toutes les taxes et frais.
                    </p>

                </div>
            </div>
        </div>

        <div class="image-container col-md-6 pull-right" data-bgimage="url(images/misc/e1.jpg) center">

        </div>
    </section>
@endsection
