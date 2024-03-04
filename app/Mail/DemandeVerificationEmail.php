<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
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
}
