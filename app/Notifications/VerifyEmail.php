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
        $domain = env('APP_FRONT');
        $verificationUrl = str_replace($domain . '/api/auth', 'solmidas.com/user', $verificationUrl);

        return (new MailMessage)
            ->subject(Lang::get('Verify Email Address'))
            ->line(Lang::get('Please click the button below to verify your email address.'))
            ->action(Lang::get('Verify Email Address'),  $verificationUrl)
            ->line(Lang::get('If you did not create an account, no further action is required.'));
            
    }
}