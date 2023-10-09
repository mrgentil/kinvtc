<header class="transparent scroll-light has-topbar">
    <div id="topbar" class="topbar-dark text-light">
        <div class="container">
            <div class="topbar-left xs-hide">
                <div class="topbar-widget">
                    <div class="topbar-widget"><a href="tel:00243816416168"><i class="fa fa-phone"></i>+243 816 416 168</a></div>
                    <div class="topbar-widget"><a href="mailto:plema@gkinvtc.com"><i class="fa fa-envelope"></i>plema@gkinvtc.com</a></div>
                </div>
            </div>

            <div class="topbar-right">
                <div class="social-icons">
                    <a href="#"><i class="fa fa-whatsapp fa-lg"></i></a>
                    <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                    <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
                    <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                    <a href="#"><i class="fa fa-youtube fa-lg"></i></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="{{url('/')}}">
                                    <img class="logo-1" src="{{asset('images/logo.png')}}" alt="" width="120" height="120">
                                    <img class="logo-2" src="{{asset('images/logokinvtc3.png')}}" alt="" width="100" height="70">
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li><a class="menu-item" href="{{url('/')}}">Accueil</a></li>
                            <li><a class="menu-item" href="{{route('cars')}}">Nos vehicules</a></li>
                            <li><a class="menu-item" href="#">Reservations</a>
                                <ul>
                                    <li><a class="menu-item" href="{{route('daily')}}">Journalière</a></li>
                                    <li><a class="menu-item" href="{{route('transport')}}">Transport Aeroport</a></li>

                                </ul>
                            </li>

                        </ul>
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            <a href="{{route('login')}}" class="btn-main">Se connecter</a>
                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
