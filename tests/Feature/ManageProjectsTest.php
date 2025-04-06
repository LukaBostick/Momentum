<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories\ProjectFactory;
class ManageProjectsTest extends TestCase
{
    use withFaker, RefreshDatabase;


    public function test_only_authenticated_user_can_create_a_project()
    {
        //$this->withoutMiddleware();
        //$this->withoutExceptionHandling();
        $attributes = ProjectFactory::new()->raw();
        $this->post('/projects',$attributes) ->assertRedirect('login');
    }



    public function test_guest_cannot_manage_projects()
    {
        $project = (new \Database\Factories\ProjectFactory)->create();

        $this->post('/projects',$project->toArray())->assertRedirect('login');

        $this->get('/projects') ->assertRedirect('login');
        $this->get('/projects/create') ->assertRedirect('login');
        $this->get($project->path())->assertRedirect('login');
    }

    public function test_a_user_can_create_a_project()
    {
        //$this->withoutMiddleware();
        //$this->withoutExceptionHandling();

        $this->signIn();

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects',$attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }



    public function test_a_project_requires_an_owner()
    {
        //$this->withoutExceptionHandling();
        $attributes = ProjectFactory::new()->raw();
        $this->post('/projects',$attributes) ->assertRedirect('login');
    }

    public function test_a_user_can_view_their_project()
    {
        $this->ActingAs(User::factory()->create());
        //$this->withoutExceptionHandling();
        $project = ProjectFactory::new()->create(['owner_id' => auth()->id()]);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    public function test_a_project_requires_a_title()
    {
        //$this->withoutExceptionHandling();

        $this->signIn();
        $attributes = ProjectFactory::new()->raw(['title' => '']);
        $this->post('/projects',$attributes) ->assertSessionHasErrors('title');
    }



    public function test_a_project_requires_a_description()
    {
        //$this->withoutExceptionHandling();
        $this->signIn();
        $attributes = ProjectFactory::new()->raw(['description' => '']);
        $this->post('/projects',$attributes) ->assertSessionHasErrors('description');
    }
    public function test_an_authenticated_user_cannot_view_the_projects_of_others()
    {
        $this->signIn();
        // $this->withoutExceptionHandling();
        $project = ProjectFactory::new()->create();

        $this->get($project->path())->assertStatus(403);


    }

}
