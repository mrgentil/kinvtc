@extends('layouts.main')
@section('content')
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
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="spacer-single sm-hide"></div>
                    <div class="p-4 rounded-3 shadow-soft" data-bgcolor="#ffffff">
                        <form name="contactForm" id="contact_form" method="get" action="{{ route('vehicules-aeroport') }}">
                            @csrf
                            <div id="step-1" class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6 mb20">
                                            <h5>Commune</h5>
                                            <select name="commune_id" id="commune_id" class="js-example-basic-multiple js-states form-control" id="id_label_multiple">
                                                @foreach($communes as $commune)
                                                    <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-6 mb20">
                                            <h5>Destination</h5>
                                            <input type="text" name="dropoffLocation" placeholder="Entrer votre destination" id="autocomplete2" autocomplete="off" class="form-control" value="{{ $defaultDropoffLocation }}">
                                            <div class="jls-address-preview jls-address-preview--hidden">
                                                <div class="jls-address-preview__header">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb20">
                                            <h5>Date aller et Heure </h5>
                                            <div class="date-time-field">
                                                <input type="text" id="date-picker" name="PickUpDate" value="">
                                                <select name="PickUpTime" id="pickup-time">
                                                    <option selected disabled value="Select time">Heure</option>
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
                                            <h5> Aller/Retour </h5>
                                            <input type="checkbox" name="roundTrip" id="roundTrip" class="custom-checkbox">
                                            <label for="roundTrip" class="custom-label"> </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <input type="submit" id="send_message" value="Trouver un  Vehicle" class="btn-main pull-right">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section aria-label="section" class="bg-light">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInRight">

                    <h2> Comment puis-je aller à l'aéroport depuis ma maison ou mon hôtel ?</h2>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".25s">
                    Laissez KIN VTC  vous transporter ! KIN VTC  est un entreprise de location véhicule avec chauffeur  que vous pouvez
                    facilement et simplement réserver via notre site internet ou notre app ! Nos chauffeurs se feront un
                    plaisir de vous conduire confortablement où vous le souhaitez, que ce soit de votre hôtel vers l'aéroport,
                    ailleurs en ville ou bien à votre destination de vacances afin de vous fournir un service de navette aéroport

                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row"><div class="col text-center">
                    <h3>LES BÉNÉFICES DU TRANSFERT D'AÉROPORT</h3>
                    <div class="spacer-20"></div>
                </div></div>

            <div class="row">
                <div class="col-md-3">
                    <i class="fa fa-trophy de-icon mb20"></i>
                    <h4>Chauffeurs professionnels</h4>
                    <p> Nos chauffeurs maîtrisent la ville et sont capables de vous conduire n'importe où. Ils sont ponctuels, courtois et respectueux des règles de sécurité.</p>
                </div>
                <div class="col-md-3">
                    <i class="fa fa-road de-icon mb20"></i>
                    <h4>Suive de vol</h4>
                    <p> Si vous entrez votre numeros de vol, nous pouvons verifier votre heure d'arriver adapter votre prise en charge</p>
                </div>
                <div class="col-md-3">
                    <i class="fa fa-tag de-icon mb20"></i>
                    <h4>Temps d'attente gratuit</h4>
                    <p>Votre chauffeur attends jusqu'à 60 minutes gratuitement selon la classe réservée</p>
                </div>
                <div class="col-md-3">
                    <i class="fa fa-money de-icon mb20"></i>
                    <h4>Prix Fixe </h4>
                    <p>Pour tous les trajets réservés à l'avance le prix est fixé au moment de la réservation.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="section-faq">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>QUESTIONS FRÉQUEMMENT POSÉES</h2>
                    <div class="spacer-20"></div>
                </div>
            </div>
            <div class="row g-custom-x">
                <div class="col-md-6 wow fadeInUp">
                    <div class="accordion secondary">
                        <div class="accordion-section">
                            <div class="accordion-section-title" data-tab="#accordion-1">
                                QUE SE PASSE-T-IL SI MON VOL EST RETARDÉ ?
                            </div>
                            <div class="accordion-section-content" id="accordion-1">
                                <p>  Si vous indiquez votre numéro de vol lors de la réservation, votre chauffeur sera capable de vérifier votre véritable heure d'arrivée. Ainsi, si votre vol est retardé, votre horaire de prise en charge sera ajustée et votre chauffeur sera là pour venir vous chercher à votre arrivée. </p>
                            </div>
                            <div class="accordion-section-title" data-tab="#accordion-2">
                                OÙ MON CHAUFFEUR VIENDRA-T-IL ME CHERCHE ?
                            </div>
                            <div class="accordion-section-content" id="accordion-2">
                                <p>votre chauffeur viendra vous chercher à l’extérieur de  l’adresse choisie. Si vous êtes à  l’aéroport, votre chauffeur viendra vous chercher une fois que aurez récupéré vos bagages.  </p>
                            </div>
                            <div class="accordion-section-title" data-tab="#accordion-3">
                                QUE FAIRE SI JE SUIS RETENUE À L’AÉROPORT ?
                            </div>
                            <div class="accordion-section-content" id="accordion-3">
                                <p>Vous n'avez pas besoin de vous inquiéter si vous mettez plus de temps que prévu pour rejoindre votre chauffeur.  Chaque transfert depuis l’aéroport est accompagné d’un temps d’attente gratuite pouvant aller jusqu’à 60 minutes selon la classe de véhicule choisi. Lors de Votre réservation, vous pouvez également sélectionner combien de temps après l’atterrissage Vous souhaitez être prise en charge afin de vous donner un peu plus de temps.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 wow fadeInUp">
                    <div class="accordion secondary">
                        <div class="accordion-section">
                            <div class="accordion-section-title" data-tab="#accordion-b-4">
                                COMMENT PUIS-JE PAYER MON TRAJET ?
                            </div>
                            <div class="accordion-section-content" id="accordion-b-4">
                                <p>Vous pouvez lier votre carte de crédit à votre compte et celle-ci  sera automatiquement débitée à la fin de votre trajet. Les prix de nos trajets réservés à l’avance sont fixés. Vous avez donc accès au prix final avant la confirmation de votre réservation</p>
                            </div>
                            <div class="accordion-section-title" data-tab="#accordion-b-5">
                                COMMENT FONCTIONNE LES TRANSFERTS AÉROPORT ?
                            </div>
                            <div class="accordion-section-content" id="accordion-b-5">
                                <p>Avec les transferts d'aéroport , vous pouvez rejoindre l'aéroport  dans un confort total, et également être récupéré dans le hall des arrivées après votre vol. Vous pouvez également bénéficier gratuitement du service de suivi de votre vol afin que votre chauffeur  vienne vous récupérer à l'heure même en cas de retard de votre vol. De plus, vous pourrez profiter de 60 minutes d'attente gratuite, afin de récupérer vos bagages sans stress.

                                    <br><br>Tous nos prix sont fixés lors de votre réservation ce qui vous procure un transfert sans surprises. Sachez que dans certaines trajet, nous sommes même moins chers que les taxis jaune. Que vous réserviez une voiture de notre classe Eco Berline, de notre classe Business Van ou de notre première classe premium, nous vous offrons toujours un bon rapport qualité-prix !

                                    <br><br>Laissez votre propre voiture au garage et réservez un véhicule chez  KIN VTC. Vous en profiterez pleinement !
                                </p>
                            </div>
                            <!-- <div class="accordion-section-title" data-tab="#accordion-b-6">
                                How do I backup my website?
                            </div>
                            <div class="accordion-section-content" id="accordion-b-6">
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
