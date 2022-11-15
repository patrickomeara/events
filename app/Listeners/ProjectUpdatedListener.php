<?php

namespace App\Listeners;

use App\Events\ProjectUpdatedEvent;

class ProjectUpdatedListener
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
    public function handle(ProjectUpdatedEvent $event)
    {
        dump("Project {$event->project->title} updated");
    }
}
