<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/projects',function ()
// {
//   $projects = App\Models\Project::all();
//
//   return view('projects.index', compact('projects'));
// });
// Route::post('/projects', function () {
//    //validate
//    // persist
//    App\Models\Project::create(request(['title','description']));
//    // redirect
// });
Route::post('projects', [ProjectsController::class, 'store']);
Route::get('projects', [ProjectsController::class, 'index']);
