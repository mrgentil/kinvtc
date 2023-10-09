<!DOCTYPE html>
<html lang="fr">
<head>
    <title>KinVTC</title>
    <link rel="icon" href="{{asset('images/logokinvtc3.png')}}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="KinVTC - Service de location des véhicules polyvalents dans la ville de Kinshasa" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- CSS Files
    ================================================== -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet" type="text/css" id="mdb">
    <link href="{{asset('css/plugins.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/coloring.css')}}" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="{{asset('css/colors/scheme-01.css')}}" rel="stylesheet" type="text/css">
</head>

<body onload="initialize()">
<div id="wrapper">

    <!-- page preloader begin -->
    <div id="de-preloader"></div>
    <!-- page preloader close -->

    <!-- header begin -->
   @include('partials.header')
    <!-- header close -->
    <!-- content begin -->
    @yield('content')
    <!-- content close -->
    <a href="#" id="back-to-top"></a>
    <!-- footer begin -->
  @include('partials.footer')
    <!-- footer close -->
</div>
<!-- Javascript Files
================================================== -->
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/designesia.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgiM7ogCAA2Y5pgSk2KXZfxF5S_1jsptA&amp;libraries=places&amp;callback=initPlaces" async="" defer=""></script>

</body>
</html>
