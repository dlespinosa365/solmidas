<?php
namespace App\Notifications;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Support\Facades\Lang;

class VerifyEmail extends VerifyEmailBase
{
//    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        $verificationUrl = str_replace('api.solmidas.com/api/auth', 'solmidas.com/user', $verificationUrl);

        return (new MailMessage)
            ->subject(Lang::get('Verificación de correo'))
            ->line(Lang::get('Por favor haga click en el siguente botón para verificar su correo electronico.'))
            ->action(Lang::get('Verificar'), $verificationUrl)
            ->line(Lang::get('Si usted no ha creado una cuenta en Solmidas, ignore este correo.'));
            
    }
}