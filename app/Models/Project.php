<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'updated' => \App\Events\ProjectUpdatedEvent::class,
    ];

    protected static function booted()
    {
        static::created(function (Project $project) {
            dump("Project {$project->title} created");
        });
    }
}
