<?php

namespace App\Listeners;

use App\Events\ReservationCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CalculateReservationTotal
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReservationCreated $event)
    {
        $reservation = $event->reservation;

        $montantTotal = $reservation->calculateTotalAmount();

        $reservation->update(['montant_total' => $montantTotal]);
    }
}
