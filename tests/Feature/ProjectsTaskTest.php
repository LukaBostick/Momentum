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

    public function test_a_project_can_have_tasks()
    {
       // $this->withoutExceptionHandling();
       $this->signIn();


        $project = auth()->user()->projects()->create(
            ProjectFactory::new()->raw()
        );

       $this->post($project->path().'/tasks', ['body'=> "lorem ipsum"]);

       $this->get($project->path())
           ->assertSee('lorem ipsum');
    }

    public function test_a_task_requires_a_body()
    {
        $this->signIn();

        $project = auth()->user()->projects()->create(
            ProjectFactory::new()->raw()
        );

        $attributes = Task::factory()->raw(['body' => '']);

        $this->post($project->path().'\tasks',$attributes)->assertSessionHasErrors('body');

    }
}
