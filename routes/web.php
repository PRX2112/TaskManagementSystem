<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/project',[ProjectController::class, 'create'])->name('projects.create');
    Route::post('/project', [ProjectController::class, 'store'])->name('projects.store');

    Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
    Route::get('/team', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/team', [TeamController::class, 'store'])->name('teams.store');

    Route::get('/tasks',[TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/tasks/{task}/assign', [TaskController::class, 'assign'])->name('tasks.assign');
});

require __DIR__.'/auth.php';
