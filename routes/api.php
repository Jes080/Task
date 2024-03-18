<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Define API routes for tasks
Route::get('/tasks', [ApiController::class, 'index'])->middleware('auth:api');
Route::post('/tasks', [ApiController::class, 'store'])->middleware('auth:api');
Route::get('/tasks/{id}', [ApiController::class, 'show'])->middleware('auth:api');
Route::put('/tasks/{id}', [ApiController::class, 'update'])->middleware('auth:api');
Route::delete('/tasks/{id}', [ApiController::class, 'destroy'])->middleware('auth:api');

?>
