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
        $domain = env('APP_FRONT');
        $url = str_replace($domain . '/api/auth', 'solmidas.com/user',$url);

        return (new MailMessage)
            ->subject(Lang::get('Reset Password Notification'))
            ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
            ->action(Lang::get('Reset Password'), $url)
            ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('If you did not request a password reset, no further action is required.'));
    }
}