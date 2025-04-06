<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Schema;

class ProjectTasksController extends Controller
{
    public function store(Project $project, Request $request) // Inject the Request object
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }
        $request->validate(['body' => 'required']);

        $project->addTask($request->input('body')); // Pass the body directly

        return redirect($project->path());
    }

    public function update(Project $project, Task $task)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        request()->validate(['body' => 'required']);

        $data = ['body' => request('body')];
        if (Schema::hasColumn('tasks', 'completed')) {
            $data['completed'] = request()->has('completed');
        }
        $task->update($data);

        $task->update([
            'body' => request('body'),
        ]);

        return redirect($project->path());
    }
}
