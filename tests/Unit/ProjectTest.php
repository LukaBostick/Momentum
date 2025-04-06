<?php

namespace Tests\Unit;

use Database\Factories\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_it_has_a_path(): void
    {
        $project = ProjectFactory::new()->create();

        $this->assertEquals("/projects/". $project ->id, $project->path());
    }
    public function test_it_can_add_a_task(){
        $project = ProjectFactory::new()->create();

        $task= $project->addTask('lorem ipsum');

       $this->assertCount(1, $project->tasks);
        $this->assertTrue($project->tasks->contains($task));
    }
}

