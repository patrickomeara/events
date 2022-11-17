<?php

namespace App\Observers;

use App\Models\Task;

class TaskObserver
{
    public function created(Task $task)
    {
        dump("Task {$task->title} created");
    }
}
