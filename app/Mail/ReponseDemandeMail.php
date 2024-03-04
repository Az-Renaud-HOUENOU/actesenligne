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

    public $etudiant;
    public $demande;
    public $chemin_fichier_complet;

    public function __construct($etudiant, $demande, $chemin_fichier_complet)
    {
        $this->etudiant = $etudiant;
        $this->demande = $demande;
        $this->chemin_fichier_complet = $chemin_fichier_complet;
    }

    public function build()
    {
        return $this->from("contact@ifri.uac.bj") // L'expéditeur
                    ->subject('Réponse à votre demande d\'acte')
                    ->view('emails.reponsedemande')
                    ->attach($this->chemin_fichier_complet);
    }
}
