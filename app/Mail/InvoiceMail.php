<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    private object $order;
    private object $orderItems;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $orderItems)
    {
        $this->order = $order;
        $this->orderItems = $orderItems;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Krims #' . $this->order->id)
            ->view('user_views.orders.invoice')
            ->with([
                'order' => $this->order,
                'orderItems' => $this->orderItems
            ]);
    }
}
