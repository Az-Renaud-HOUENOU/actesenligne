<?php

namespace App\Notifications;

use App\Models\Demande;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DemandeNotifcation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $demande;

    public function __construct($demande)
    {

        //
        $this->demande = $demande;  

    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];

    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $demande = $this->demande;
        $verificationLink = url('/verification/' . $demande->id . '/' . $demande->otp);


        return (new MailMessage)
                    ->subject('Nouvelle demande créée')
                    ->line('Une nouvelle demande a été créée avec succès.')
                    ->line('Détails de la demande :')
                    ->line('Nom: ' . $demande->nom)
                    ->line('Prénom: ' . $demande->prenom)
                    ->action('Vérifier la demande', $verificationLink)
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            
        ];
    }
}
