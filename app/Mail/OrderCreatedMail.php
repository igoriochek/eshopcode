<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    private object $order;
    private object $customer;
    private object $orderItems;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $customer, $orderItems)
    {
        $this->order = $order;
        $this->customer = $customer;
        $this->orderItems = $orderItems;
    }

    private function calculateOrderItemCountSum(object $orderItems): int
    {
        $countSum = 0;

        foreach ($orderItems as $orderItem) {
            $countSum += $orderItem->count;
        }

        return $countSum;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(__('messages.orderCreatedSubject'))
            ->markdown(__('messages.orderCreatedMarkdown'))
            ->with([
                'order' => $this->order,
                'customer' => $this->customer,
                'orderItems' => $this->orderItems,
                'orderItemCountSum' => $this->calculateOrderItemCountSum($this->orderItems)
            ]);
    }
}
