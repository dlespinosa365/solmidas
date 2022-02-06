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

        // http://127.0.0.1:8000/api/verify-email/1/e7966cc7ebb0f44019f4a91790b5ce938f1b40ab?expires=1642879229&signature=c806ce67ddeb5ed1d5d3ef39f5954b9cee2f7681b395523b8eb74242dd6ca6c2
        $urlPart = explode('api', $verificationUrl)[1];
        $verificationUrl = 'https://solmidas.com' . $urlPart;

        return (new MailMessage)
            ->subject(Lang::get('Verificación de correo'))
            ->line(Lang::get('Por favor haga click en el siguente botón para verificar su correo electronico.'))
            ->action(Lang::get('Verificar'), $verificationUrl)
            ->line(Lang::get('Si usted no ha creado una cuenta en Solmidas, ignore este correo.'));
            
    }
}