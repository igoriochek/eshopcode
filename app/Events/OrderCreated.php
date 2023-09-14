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

    public object $order;
    public object $customer;
    public object $orderItems;
    public ?array $companyInfo;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order, $customer, $orderItems, $jsonorder, $companyInfo = null)
    {
        $this->order = $order;
        $this->customer = $customer;
        $this->orderItems = $orderItems;
        $this->companyInfo = $companyInfo;
        $this->jsonorder = $jsonorder
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
