<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::orderBy('created_at','desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required|max:255',
            'description' => 'nullable|string'
        ]);

        Task::create($data);
        return redirect()->route('tasks.index');
    }

     
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title'=> 'required|max:255',
            'description' => 'nullable',
            
        ]);
        $data['is_done'] = $request->boolean('is_done');
        $task->update($data);

        return redirect()->route('tasks.index'); 
    }

   
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
