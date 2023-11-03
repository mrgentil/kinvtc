<!DOCTYPE html>
<html lang="zxx">


<head>
    <title>KinVTC Mon Compte</title>
    <link rel="icon" href="../images/logokinvtc3.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="KinVTC - Service de location des véhicules polyvalents dans la ville de Kinshasa" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- CSS Files
    ================================================== -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="../css/mdb.min.css" rel="stylesheet" type="text/css" id="mdb">
    <link href="../css/plugins.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../css/coloring.css" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="../css/colors/scheme-01.css" rel="stylesheet" type="text/css">
</head>

<body onload="initialize()">
<div id="wrapper">

    <!-- page preloader begin -->
    <div id="de-preloader">


    </div>
    <!-- page preloader close --> <!-- header begin -->
    @include('partials.headdradmin')
    <!-- header close -->
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="../images/background/14.jpg" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Mon tableau de bord</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-cars" class="bg-gray-100">
            <div class="container">
                <div class="row">
                    @include('partials.sidebar')

                    @yield('content')
                </div>
            </div>
        </section>


    </div>
    <a href="#" id="back-to-top"></a>
    <!-- footer begin -->
    @include('partials.footer')
    <!-- footer close -->
</div>


<!-- Javascript Files
================================================== -->
<script src="../js/plugins.js"></script>
<script src="../js/designesia.js"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgiM7ogCAA2Y5pgSk2KXZfxF5S_1jsptA&amp;libraries=places&amp;callback=initPlaces"
    async="" defer=""></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=[Placed my key]&libraries=places" async defer></script> -->

</body>

</html>
