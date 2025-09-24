<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index');
    }
    public function create ()
    {
        return view('tasks.create');   
        
    }
    public function store(Request $request)
    {
        $data =$request ->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    }
}
