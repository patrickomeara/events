<?php

namespace App\Listeners;


use App\Events\ProjectArchivedEvent;

class ProjectArchivedListener
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
    public function handle(ProjectArchivedEvent $event)
    {
        dump("Project archived: {$event->project->title}");
    }
}
