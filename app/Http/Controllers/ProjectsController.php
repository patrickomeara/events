<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectsController extends Controller
{
    public function create()
    {
        Project::factory()->create();
    }
}
