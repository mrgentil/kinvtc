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
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <!-- color scheme -->
    <link id="colors" href="{{asset('css/colors/scheme-01.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>


<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/designesia.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgiM7ogCAA2Y5pgSk2KXZfxF5S_1jsptA&amp;libraries=places&amp;callback=initPlaces" async="" defer=""></script>
<!-- Include SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function updateDetails() {
        // Récupérer les nouvelles valeurs soumises depuis le formulaire
        var newPickupLocation = document.getElementById('pickup-location-input').value;
        var newPickUpDate = document.getElementById('date-picker').value;
        var newPickUpTime = document.getElementById('pickup-time').value;
        var newCollectionDate = document.getElementById('date-picker-2').value;
        var newCollectionTime = document.getElementById('collection-time').value;

        // Mettre à jour les éléments HTML correspondants avec les nouvelles valeurs
        document.getElementById('pickup-location').textContent = "Lieu d'embarquement : " + newPickupLocation;
        document.getElementById('pick-up-details').textContent = "Date et heure de début : " + newPickUpDate + " à " + newPickUpTime;
        document.getElementById('collection-details').textContent = "Date et heure de retour : " + newCollectionDate + " à " + newCollectionTime;
    }
</script>
<script>
    function updateDetailsAeroport() {
        var newPickupLocation = document.getElementById('commune_id-input').value;
        var newPickUpDate = document.getElementById('date-picker').value;
        var newPickUpTime = document.getElementById('pickup-time').value;
        var newCollectionDate = document.getElementById('date-picker-2').value;
        var newCollectionTime = document.getElementById('collection-time').value;

        // Récupérez la valeur de Aller/Retour
        var allerRetour = document.getElementById('aller_retour').checked;
        var allerRetourText = allerRetour ? 'Oui' : 'Non';

        // Récupérez la nouvelle destination
        var newDropoffLocation = document.getElementById('dropoff-location').value;

        document.getElementById('commune-details').textContent = "Commune : " + newPickupLocation;
        document.getElementById('destination-details').textContent = "Destination : " + newDropoffLocation;
        document.getElementById('pick-up-details').textContent = "Date et heure de début : " + newPickUpDate + " à " + newPickUpTime;
        document.getElementById('collection-details').textContent = "Date et heure de retour : " + newCollectionDate + " à " + newCollectionTime;
        document.getElementById('aller-retour-details').textContent = "Aller/Retour : " + allerRetourText;
    }


</script>
<script>
    $(document).ready(function() {
        $('.select2').select2()
    });
</script>
</body>
</html>
