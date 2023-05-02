<?php

namespace App\Mail;

use App\Models\PaidAccessory;
use App\Models\FreeAccessory;
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

    private function setAccessoriesToOrderItems(object $orderItems): void
    {
        foreach ($orderItems as $orderItem) {
            $orderItem->paidAccessories = $this->setPaidAccessoriesToOrderItem($orderItem);
            $orderItem->freeAccessories = $this->setFreeAccessoriesToOrderItem($orderItem);
        }

        $this->orderItems = $orderItems;
    }

    private function setPaidAccessoriesToOrderItem(object $orderItem): object
    {
        $paidAccessories = collect();

        if ($orderItem->paid_accessories) {
            $paidAccessoryIds = explode(',', $orderItem->paid_accessories);

            foreach ($paidAccessoryIds as $paidAccessoryId) {
                $paidAccessories->add(PaidAccessory::find($paidAccessoryId));
            }
        }

        return $paidAccessories;
    }

    private function setFreeAccessoriesToOrderItem(object $orderItem): object
    {
        $freeAccessories = collect();

        if ($orderItem->free_accessories) {
            $freeAccessoryIds = explode(',', $orderItem->free_accessories);

            foreach ($freeAccessoryIds as $freeAccessoryId) {
                $freeAccessories->add(FreeAccessory::find($freeAccessoryId));
            }
        }

        return $freeAccessories;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->setAccessoriesToOrderItems($this->orderItems);

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