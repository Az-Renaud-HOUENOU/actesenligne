<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReponseDemandeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $data = [];

    public function __construct(Array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from("contact@ifri.uac.bj") // L'expéditeur
                    ->subject('Réponse à votre demande d\'acte académique')
                    ->view('emails.reponsedemande')
                    ->attach($this->data['chemin_fichier_complet']);
    }
}
