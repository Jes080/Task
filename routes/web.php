<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;


Route::get('/', function () {
    $tasks = Task::all();
        $title = 'Task List';
        return view('pages/dashboard', compact('tasks', 'title'));
});

// Route to store data
Route::post('/', [TaskController::class, 'store'])->name('store');

// Route to fetch task data by ID
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');

// Route to update a task
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

//To delete
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
