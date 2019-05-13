<?php

namespace App\Events;

use App\Payment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PaymentCreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $payment;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Payment $payment, string $type)
    {
        $this->payment = $payment;
        $this->type = $type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
