<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyOTPNotification extends VerifyEmail
{
    use Queueable;

    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        $verificationUrl = route('verifiedEmail', ['email' => $notifiable->getEmailForVerification(), 'id' => $this->id]);
        return (new MailMessage)
                ->subject('Verify Your Email Address')
                ->line('Please click the button below to change your email address.')
                ->action('Verify Email Address', $verificationUrl)
                ->line('Do not share this email to others.');
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
