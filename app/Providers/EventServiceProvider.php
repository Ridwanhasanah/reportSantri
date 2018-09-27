<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Auth\UserActivationEmail' => [
            'App\Listeners\Auth\SendActivationEmail',
        ],
        'App\Events\Invoice\EventSendInvoice' => [
            'App\Listeners\Invoice\ListenerSendInvoice',
        ],
        'App\Events\Invoice\EventConfirmationTransfer' => [
            'App\Listeners\Invoice\ListenerConfirmationTransfer',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
