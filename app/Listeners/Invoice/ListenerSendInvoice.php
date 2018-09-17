<?php

namespace App\Listeners\Invoice;

use App\Events\Invoice\EventSendInvoice;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Invoice\SendInvoice;
use Mail;

class ListenerSendInvoice
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
     * @param  EventSendInvoice  $event
     * @return void
     */
    public function handle(EventSendInvoice $event)
    {
        Mail::to($event->order->email)->send(new SendInvoice($event->order));
    }
}
