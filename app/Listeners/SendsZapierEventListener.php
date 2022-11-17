<?php

namespace App\Listeners;

use App\Events\Concerns\SendsZapierEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendsZapierEventListener implements ShouldQueue
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
    public function handle(SendsZapierEvent $event)
    {
        ray("Event sent to Zapier: {$event->toZapier()->eventName}");
    }
}
