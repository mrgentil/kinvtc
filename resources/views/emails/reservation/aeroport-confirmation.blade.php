@component('mail::message')
    # Confirmation de réservation

    Votre réservation a été confirmée. Voici les détails de votre réservation :

    - Véhicule: {{ $reservation->vehicule->name }}
    - Destination: {{ $reservation->dropoffLocation }}
    - Commune de réservation : {{ $reservation->vehicule->commune->name }}
    - Date réservation: {{ $reservation->pickUpDate }}
    - Heure réservation: {{ $reservation->pickUpTime }}
    - Réservation avec possibilité Aller/Retour : {{ $reservation->aller_retour ? 'Oui' : 'Non' }}
    - Montant total: {{ $reservation->cout_total }}$


    <p>Merci d'utiliser notre service. <a href="https://maxicashme.com/KINVTC">Cliquez ici pour effectuer votre paiement</a></p>
@endcomponent
