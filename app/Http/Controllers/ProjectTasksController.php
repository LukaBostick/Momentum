<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function store(Project $project, Request $request) // Inject the Request object
    {
        if(auth()->user()->isNot($project->owner))
        {
            abort(403);
        }
        $request->validate(['body' => 'required']);

        $project->addTask($request->input('body')); // Pass the body directly

        return redirect($project->path());
    }
}
