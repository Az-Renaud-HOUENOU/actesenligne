<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DemandeVerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $code_demande;
    public $acte_demande;

    public function __construct(string $code_demande, string $acte_demande)
    {
        $this->code_demande = $code_demande;
        $this->acte_demande = $acte_demande;
    }

    public function build()
    {
        return $this->from("contact@ifri.uac.bj") // L'expéditeur
                    ->subject("Demande reçcu") // Le sujet
                    ->view('emails.codedemande');
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
