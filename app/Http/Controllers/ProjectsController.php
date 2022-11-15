<?php

namespace App\Http\Controllers;

use App\Events\ProjectArchivedEvent;
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

    public function archive()
    {
        $project = Project::query()->inRandomOrder()->firstOrFail();
        $project->update([
            'archived_at' => now(),
        ]);
        ProjectArchivedEvent::dispatch($project);
    }
}
