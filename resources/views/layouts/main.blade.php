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
<script>
    $(document).ready(function () {
        // Sélectionnez les champs de formulaire
        const debutReservation = $('#debut_reservation');
        const finReservation = $('#fin_reservation');
        const prixJournalier = {{ $vehicule->type->price_journalier }};
        const montantTotal = $('.montant-total'); // Utilisez la classe CSS ici

        // Mettez à jour le tarif lorsque les champs de formulaire changent
        debutReservation.on('change', updateTarif);
        finReservation.on('change', updateTarif);

        function updateTarif() {
            // Calculez la différence entre les dates de début et de fin
            const debut = new Date(debutReservation.val());
            const fin = new Date(finReservation.val());
            const differenceEnJours = (fin - debut) / (1000 * 60 * 60 * 24);

            if (differenceEnJours <= 0) {
                // Si la différence est inférieure ou égale à zéro, affichez le prix initial
                montantTotal.text('$' + prixJournalier);
            } else {
                // Sinon, mettez à jour le tarif en fonction de la différence de jours
                const nouveauMontantTotal = differenceEnJours * prixJournalier;
                montantTotal.text('$' + nouveauMontantTotal);
            }
        }
    });
</script>

<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/designesia.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgiM7ogCAA2Y5pgSk2KXZfxF5S_1jsptA&amp;libraries=places&amp;callback=initPlaces" async="" defer=""></script>
<!-- Include SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>
</html>
