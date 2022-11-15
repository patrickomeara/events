<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectsController extends Controller
{
    public function create()
    {
        Project::factory()->create();
    }

    public function update()
    {
        Project::query()->inRandomOrder()->first()->update([
            'title' => 'New title',
        ]);
    }
}
