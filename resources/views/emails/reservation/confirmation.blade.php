@component('mail::message')
    # Confirmation de réservation

    Votre réservation a été confirmée. Voici les détails de votre réservation :

    - Véhicule: {{ $reservation->vehicule->name }}
    - Lieu d'embarquement: {{ $reservation->pickup_location }}
    - Date de début: {{ $reservation->pick_up_date }}
    - Date de retour: {{ $reservation->collection_date }}
    - Montant total: {{ $reservation->cout_total }}$

    <p>Merci d'utiliser notre service. <a href="https://maxicashme.com/KINVTC">Cliquez ici pour effectuer votre paiement</a></p>
@endcomponent
