<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // A function to get all the tasks
    public function index()
    {
        return Task::all();
    }

    // A function to create a new task
    public function store(Request $request)
    {
        // First, we validate the incoming data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Then, we create the task and save it to the database
        $task = Task::create($validatedData);

        // Finally, we send back the newly created task
        return response()->json($task, 201);
    }
}