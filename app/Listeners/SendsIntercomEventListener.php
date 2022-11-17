<?php

namespace App\Listeners;

use App\Events\Concerns\SendsIntercomEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendsIntercomEventListener
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
    public function handle(SendsIntercomEvent $event)
    {
        dump("Event sent to Intercom: {$event->toIntercom()->eventName}");
    }
}
