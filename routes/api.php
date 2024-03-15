<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tasks', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Task::all();
});

Route::get('tasks/{id}', function($id) {
    return Task::find($id);
});

Route::post('tasks', function(Request $request) {
    return Task::create($request->all);
});

Route::put('tasks/{id}', function(Request $request, $id) {
    $tasks = Task::findOrFail($id);
    $tasks->update($request->all());

    return $tasks;
});

Route::delete('tasks/{id}', function($id) {
    Task::find($id)->delete();

    return 204;
});

Route::get('show', 'TaskController@index');
Route::get('tasks/{task}', 'TaskController@show');
Route::post('tasks', 'TaskController@store');
Route::put('tasks/{task}', 'TaskController@update');
Route::delete('tasks/{task}', 'TaskController@delete');

?>
