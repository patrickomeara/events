<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TasksController extends Controller
{
    public function create()
    {
        Task::factory()->create();
    }
}
