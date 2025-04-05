<?php

use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(); // Add this line

Route::middleware(['auth'])->group(function () {
    Route::get('projects', [ProjectsController::class, 'index'])->name('projects.index');
    Route::post('projects', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('projects/create', [ProjectsController::class, 'create'])->name('projects.create');
    Route::get('projects/{project}', [ProjectsController::class, 'show'])->name('projects.show');
    // ... other authenticated project routes
});

Route::get('/', function () {
    return view('welcome');
});
