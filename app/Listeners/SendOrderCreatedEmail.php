<?php

namespace App\Listeners;

use App\Mail\OrderCreatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderCreatedEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to('info@biliardas.com')->send(new OrderCreatedMail(
            $event->orderId,
            $event->orderSum,
            $event->customerName,
            $event->orderItems
        ));
    }
}
