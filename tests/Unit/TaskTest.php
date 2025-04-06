<?php

namespace Tests\Unit;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
   use RefreshDatabase;

   public function test_it_belongs_to_a_project()
   {
       // Assuming Task is an Eloquent model in your App\Models namespace
       $task = Task::factory()->create();

       $this->assertInstanceOf(Project::class, $task->project);
   }
    public function test_it_has_a_path()
    {
        $project = Task::factory()->create();
        $task = Task::factory()->create(['project_id' => $project->id]);

        $this->assertEquals("/projects/{$project->id}/tasks/{$task->id}", $task->path());
    }
}
