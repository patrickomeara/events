<?php

namespace App\Http\Controllers;

use App\Events\ProjectArchivedEvent;
use App\Events\ProjectUpdatedEvent;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function create()
    {
        Project::factory()->create();
    }

    public function update()
    {
        $project = Project::query()->inRandomOrder()->firstOrFail();
        $project->update([
            'title' => 'New title',
        ]);

        ProjectUpdatedEvent::dispatch($project);
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
