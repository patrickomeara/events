<?php

namespace App\Http\Controllers;

use App\Events\TaskClosedEvent;
use App\Models\Task;

class TasksController extends Controller
{
    public function create()
    {
        Task::factory()->create();
    }

    public function close()
    {
        $task = Task::query()->inRandomOrder()->firstOrFail();
        $task->update([
            'closed_at' => now(),
        ]);
        TaskClosedEvent::dispatch($task);
    }
}
