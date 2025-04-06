<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Database\Factories\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class ProjectsTaskTest extends TestCase
{
    use refreshDatabase, WithFaker;
public function test_guests_cannot_add_tasks_to_projects()
{
    $project = ProjectFactory::new()->create();
    $this->post($project->path().'/tasks')->assertRedirect('/login');
}


    public function test_a_project_can_have_tasks()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(
            ProjectFactory::new()->raw()
        );

        $this->post($project->path().'/tasks', ['body'=> "lorem ipsum"]);

        // Refresh the project to load the newly created task
        $project->refresh();

        $this->get($project->path())
            ->assertSee('Lorem Ipsem.'); // Match the case in your template
    }
function test_only_the_owner_of_a_project_may_add_tasks()
{
    $this->signIn();
    $project = ProjectFactory::new()->create();

    $this->post($project->path().'/tasks', ['body'=> "Lorem ipsum"])
    ->assertStatus(403);

    $this->assertDatabaseMissing('tasks', ['body'=> "Lorem ipsum"]);
}
    public function test_a_task_requires_a_body()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(
            ProjectFactory::new()->raw()
        );

        $attributes = Task::factory()->raw(['body' => '']);

        // Ensure validation is triggered by sending the data
        $this->post($project->path().'/tasks',$attributes)
            ->assertSessionHasErrors('body');
    }
}
