<?php

namespace App\Notifications;

use App\Models\Demande;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DemandeApprouveeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $demande;

    public function __construct(Demande $demande)
    {
        $this->demande = $demande;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new \Illuminate\Notifications\Messages\MailMessage)
                    ->subject('Sujet de l\'email')
                    ->greeting('Bonjour!')
                    ->line('Votre demande a été approuvée.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'etudiant' => $this->demande->etudiant->nom,
            'type_acte_demande' => $this->demande->acteAcademique->type_acte,
            'heure_demande' => now(),
        ];
    }
}
