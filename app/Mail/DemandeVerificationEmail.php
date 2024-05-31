<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemandeVerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];

    public function __construct(Array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from("contact@ifri.uac.bj") // L'expéditeur
                    ->subject("Demande reçue") // Le sujet
                    ->view('emails.codedemande');
    }
}
