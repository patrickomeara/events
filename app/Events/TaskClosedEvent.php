<?php

namespace App\Events;

use App\Events\Concerns\SendsIntercomEvent;
use App\Events\Concerns\SendsZapierEvent;
use App\Events\Data\IntercomEventData;
use App\Events\Data\ZapierEventData;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskClosedEvent implements SendsZapierEvent, SendsIntercomEvent
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public Task $task, public User $user)
    {
        //
    }

    public function toZapier(): ZapierEventData
    {
        return new ZapierEventData(
            eventName: 'task_closed',
            meta: [
                'task_id' => $this->task->id,
                'task_title' => $this->task->title,
                'task_closed_at' => $this->task->closed_at,
                'task_project_id' => $this->task->project_id,
                'task_project_name' => $this->task->project->name,
            ],
            created_at: $this->task->created_at,
        );
    }

    public function toIntercom(): IntercomEventData
    {
        return new IntercomEventData(
            user: $this->user,
            eventName: 'task_closed',
            meta: [
                'task_id' => $this->task->id,
                'task_title' => $this->task->title,
                'task_closed_at' => $this->task->closed_at,
                'task_project_id' => $this->task->project_id,
                'task_project_name' => $this->task->project->name,
            ],
            created_at: $this->task->created_at,
        );
    }
}
