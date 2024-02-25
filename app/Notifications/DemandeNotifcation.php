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
    public $heure_demande;

    public function __construct(Demande $demande)
    {
        $this->demande = $demande;
        $this->heure_demande = now();
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
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'type_acte_demande' => $this->demande->acteAcademique->type_acte,
            'heure_demande' => now(),
        ];
    }
}
