<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class AccountDeactivationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via(object $notifiable)
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $deletionDate = Carbon::now()->addDays(30)->format('F d, Y');
        return (new MailMessage)
                    ->greeting('Hello ' . $notifiable->name . ',')
                    ->line('Your account has been temporarily deactivated.')
                    ->line('If no action is taken, your account will be permanently deleted on ' . $deletionDate . '.')
                    ->line('If you believe this is a mistake or wish to reactivate your account, please contact our support team or try login again.')
                    ->line('Thank you for using our application!');
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
