<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Project;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_create_a_task()
    {
        $user = User::factory()->create();
        $project = Project::factory()->create();

        $taskData = [
            'title' => 'My new task',
            'project_id' => $project->id,
            'user_id' => $user->id,
        ];

        $response = $this->postJson('/api/tasks', $taskData);

        $response->assertStatus(201)
                 ->assertJsonFragment(['title' => 'My new task']);

        $this->assertDatabaseHas('tasks', ['title' => 'My new task']);
    }
}