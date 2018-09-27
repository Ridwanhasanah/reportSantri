<?php

namespace App\Listeners\Invoice;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\Invoice\ConfirmationTransfer;
use App\Events\Invoice\EventConfirmationTransfer;

class ListenerConfirmationTransfer
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
    public function handle(EventConfirmationTransfer $event)
    {
        Mail::to($event->order->email)->send(new ConfirmationTransfer($event->order));

    }
}
