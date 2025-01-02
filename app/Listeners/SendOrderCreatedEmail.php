<?php

namespace App\Listeners;

use App\Mail\InvoiceMail;
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
            'vilmavenckute3@gmail.com',
            'igoriok.katin@gmail.com',
            'ignataviciene808@gmail.com'
        ];

        Mail::to($emails)->send(new OrderCreatedMail(
            $event->order,
            $event->customer,
            $event->orderItems,
            $event->companyInfo ?? null
        ));

        $customer_mail = $event->customer->email;
        if ($customer_mail) {
            Mail::to($customer_mail)->send(new InvoiceMail(
                $event->order,
                $event->orderItems
            ));
        }
    }
}
