<?php

namespace App\Events;

use App\Events\Concerns\SendsZapierEvent;
use App\Events\Data\ZapierEventData;
use App\Models\Project;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectArchivedEvent implements SendsZapierEvent
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public Project $project)
    {

    }

    public function toZapier(): ZapierEventData
    {
        return new ZapierEventData(
            eventName: 'project_archived',
            meta: [
                'project_id' => $this->project->id,
                'project_title' => $this->project->title,
                'project_archived_at' => $this->project->archived_at,
            ],
            created_at: $this->project->created_at,
        );
    }
}
