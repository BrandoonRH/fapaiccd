<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Project;
use App\Models\User;
use App\Policies\SolicitudPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
       // Project::class => ProjectPolicy::class,
       Project::class => SolicitudPolicy::class,
       //User::class => SolicitudPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
            ->subject('Verificar Cuenta en FAPAI')
            ->line('Tu Cuenta ya esta casi lista, solo debes presionar el enlace a continuación')
            ->action('Confirmar Cuenta', $url)
            ->line('Si no creaste esta cuenta, puedes ignorar este mensaje');
        });

       /* VerifyEmail::createUrlUsing(function($notifiable, $url){
            return (new MailMessage)
            ->subject('Cambiar Contraseña en FAPAI')
            ->line('Está recibiendo este correo electrónico porque hemos recibido una solicitud de restablecimiento de contraseña para su cuenta.')
            ->action('Restablecer Contraseña', $url)
            ->line('Este enlace para restablecer la contraseña caducará en 60 minutos.')
            ->line('Si no ha solicitado el restablecimiento de la contraseña, no es necesario realizar ninguna acción.');
        }); */
    }
}
