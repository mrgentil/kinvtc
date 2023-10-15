<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public Reservation $reservation;


    /**
     * Create a new message instance.
     *
     * @param Reservation $reservation
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->subject('Confirmation Réservation ☺️')
            ->view('emails.confirmation_reservation');
    }
    public function toMail($notifiable): MailMessage
    {
        $url = url('/reservation/' . $this->reservation->id); // Lien vers la page de confirmation

        return (new MailMessage)
            ->line('Votre réservation a été créée avec succès!')
            ->action('Cliquez ici pour confirmer', $url)
            ->line('Merci de nous avoir choisis!');
    }


}
