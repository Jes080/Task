<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/taskfunc', function () {
    $tasks = Task::all();
    $title = 'Task List';
    return view('pages.taskfunc', compact('tasks', 'title'));})->middleware(['auth', 'verified'])->name('taskfunc');

Route::middleware('auth')->group(function () {
// Route to store data
Route::post('/taskfunc', [TaskController::class, 'store'])->name('store');
    // Route to fetch task data by ID
Route::get('/taskfunc/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');

// Route to update a task
Route::put('/taskfunc/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

//To delete
Route::delete('/taskfunc/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

// Route to store data
Route::post('/', [TaskController::class, 'store'])->name('store');

// Route to fetch task data by ID
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');

// Route to update a task
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

//To delete
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

require __DIR__.'/auth.php';
