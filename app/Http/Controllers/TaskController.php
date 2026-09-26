<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // View all tasks
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    // Show Add Task page
    public function create()
    {
        return view('tasks.create');
    }

    // Save new task
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return redirect('/tasks');
    }

    // Show Edit Task page
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update existing task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'due_date' => 'required|date',
        ]);

        $task->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return redirect('/tasks');
    }

    // Delete task
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks');
    }
}