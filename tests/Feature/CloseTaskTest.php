<?php

namespace Tests\Feature;

use App\Events\TaskClosedEvent;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CloseTaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Event::fake(TaskClosedEvent::class);

        // Arrange
        $user = User::factory()->create([
            'name' => 'Test User',
        ]);
        Task::factory()->create();
        $this->actingAs($user);

        // Act
        $response = $this->get(route('tasks.close'));

        // Assert
        $response->assertStatus(200);
        Event::assertDispatched(
            TaskClosedEvent::class,
            fn (TaskClosedEvent $event) => $event->user->id === $user->id
        );
    }
}
