<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $orderId;
    public float $orderSum;
    public string $customerName;
    public object $orderItems;
    public array $emails;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($orderId, $orderSum, $customerName, $orderItems, $emails)
    {
        $this->orderId = $orderId;
        $this->orderSum = $orderSum;
        $this->customerName = $customerName;
        $this->orderItems = $orderItems;
        $this->emails = $emails;
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
