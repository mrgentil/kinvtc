<?php

namespace App\Mail;

use App\Models\ReservationAeroport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservationAeroportConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public ReservationAeroport $reservation;
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reservation.aeroport-confirmation');
    }

}
