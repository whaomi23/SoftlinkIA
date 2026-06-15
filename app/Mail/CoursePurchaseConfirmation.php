<?php

namespace App\Mail;

use App\Models\Inscripcion;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CoursePurchaseConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $inscripciones;
    public $totalAmount;
    public $stripeSessionId;
    public $purchaseDate;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, $inscripciones, $totalAmount, $stripeSessionId)
    {
        $this->user = $user;
        $this->inscripciones = $inscripciones;
        $this->totalAmount = $totalAmount;
        $this->stripeSessionId = $stripeSessionId;
        $this->purchaseDate = now();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '🎓 ¡Compra Exitosa! - Acceso a tus Cursos SoftLinkIA',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.course-purchase-confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
