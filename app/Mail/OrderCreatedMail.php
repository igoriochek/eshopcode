<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    private int $orderId;
    private float $orderSum;
    private string $customerName;
    private object $orderItems;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderId, $orderSum, $customerName, $orderItems)
    {
        $this->orderId = $orderId;
        $this->orderSum = $orderSum;
        $this->customerName = $customerName;
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
            ->markdown(__('messages.orderCreatedMarkDown'))
            ->with([
                'orderId' => $this->orderId,
                'customerName' => $this->customerName,
                'orderItems' => $this->orderItems,
                'orderSum' => $this->orderSum,
                'orderItemCountSum' => $this->calculateOrderItemCountSum($this->orderItems)
            ]);
    }
}
