<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token; 
    public $userName;

    /**
     * Create a new notification instance.
     */
    public function __construct($token, $userName)
    {
        $this->token = $token; 
        $this->userName = $userName;
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

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Cambiar Contraseña en FAPAI')
        ->line("Hola, {$this->userName}!")
        ->line('Está recibiendo este correo electrónico porque hemos recibido una solicitud de restablecimiento de contraseña para su cuenta.')
        ->action('Restablecer Contraseña', url(config('app.url').route('password.reset', $this->token, false)))
        ->line('Este enlace para restablecer la contraseña caducará en 60 minutos.')
        ->line('Si no ha solicitado el restablecimiento de la contraseña, no es necesario realizar ninguna acción.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
