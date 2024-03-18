<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;



class ApiController extends Controller
{
    // Method to fetch all tasks
    public function index()
    {
        return Task::all();
    }

    // Method to create a new task
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due' => 'required|date',
            'priority' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Not Started,In Progress,Completed',
        ]);

        // Create a new task using the validated data
        $task = Task::create($validatedData);

        // Return the created task
        return response()->json($task, 201);
    }

    // Method to fetch a task by ID
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    // Method to update a task
    public function update(Request $request, $id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due' => 'required|date',
            'priority' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Not Started,In Progress,Completed',
        ]);

        // Update the task with the validated data
        $task->update($validatedData);

        // Return a success response
        return response()->json($task, 200);
    }

    // Method to delete a task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        // Return a success response
        return response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
