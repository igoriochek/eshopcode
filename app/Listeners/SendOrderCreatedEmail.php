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
        $emails = [
            $event->customerEmail,
            'ieva@buhalteres.lt'
        ];

        Mail::to($emails)->send(new OrderCreatedMail(
            $event->orderId,
            $event->orderSum,
            $event->customerName,
            $event->orderItems
        ));
    }
}
