<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create ()
    {
        return view('tasks.create');   
        
    }
  public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,done',
        ]);

        // Attach logged-in user ID
        $data['user_id'] = auth()->id(); // this ensures user_id is set

        Task::create($data);

        return redirect()->route('task.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);   
    }

    public function update( Task $task, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,done',
        ]);

        $task->update($data);

        return redirect(route('task.index')) ->with ('success', 'Task updated successfully.');
    }

    public function delete(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Task deleted successfully.');
    }



}