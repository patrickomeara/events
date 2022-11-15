<?php

namespace App\Providers;

use App\Events\Concerns\SendsIntercomEvent;
use App\Events\Concerns\SendsZapierEvent;
use App\Events\ProjectArchivedEvent;
use App\Events\ProjectUpdatedEvent;
use App\Listeners\ProjectArchivedListener;
use App\Listeners\ProjectUpdatedListener;
use App\Listeners\SendsIntercomEventListener;
use App\Listeners\SendsZapierEventListener;
use App\Models\Task;
use App\Observers\TaskObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ProjectUpdatedEvent::class => [
            ProjectUpdatedListener::class,
        ],
        ProjectArchivedEvent::class => [
            ProjectArchivedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Task::observe(TaskObserver::class);

        Event::listen(SendsZapierEvent::class, SendsZapierEventListener::class);
        Event::listen(SendsIntercomEvent::class, SendsIntercomEventListener::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
