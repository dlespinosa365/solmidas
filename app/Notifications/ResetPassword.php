<?php
namespace App\Notifications;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordBase;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends ResetPasswordBase
{
//    use Queueable;

    // change as you want
    public function buildMailMessage($url)
    {
        $url = str_replace('api.solmidas.com/api/auth', 'solmidas.com/user',$url);

        return (new MailMessage)
            ->subject(Lang::get('Notificacion de reestablecimiento de contraseña'))
            ->line(Lang::get('Recibiste este email porque solicitaste un reestablecimiento de tu contraseña'))
            ->action(Lang::get('Reestablecer'), $url)
            ->line(Lang::get('Este enlace expirara en :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('Si no solicitaste el reestablecimiento de tu contraseña, ignora este mensaje.'));
    }
}