<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SentMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $frdID;
    public $sendID;
    public function __construct($message, $frdID, $sendID)
    {
        $this->message = $message;
        $this->frdID = $frdID;
        $this->sendID = $sendID;
    }

    public function broadcastOn()
    {
        return 'my-channel';
    }
    public function broadcastAs()
    {
        return 'my-event';
    }
}
