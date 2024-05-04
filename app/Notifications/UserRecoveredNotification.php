<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRecoveredNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via(object $notifiable)
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting('Hello ' . $this->user->name . ',')
                    ->line('Your account has been recovered.')
                    ->action('Login Here', route('user.login'))
                    ->line('You can now login to your account using your existing credentials. Thank you for being with us!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
