<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BuildingRestoredNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $building;
    public $landlord;

    public function __construct($building, $landlord)
    {
        $this->building = $building;
        $this->landlord = $landlord;
    }

    public function via(object $notifiable)
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting('Hello ' . $this->landlord->name . ',')
                    ->line('Your building "' . $this->building->name . '" has been restored by the admin.')
                    ->line('Restoration Time: ' . now()->toDateTimeString())
                    ->action('View Building', url(route('building.index')))
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
