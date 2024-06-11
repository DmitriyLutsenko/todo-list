<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where(['is_active' => 1])->with(['label'])->paginate(8);
        return view('todo.index', ['tasks' => $tasks]);
    }

    public function show($id)
    {
        $task = Task::where(['is_active' => 1])->with(['label'])->firstOrFail();
        return view('todo.detail', ['task' => $task]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        $task = new Task();
        $task->title =  $request->input('title');
        $task->is_active = 1;
        $task->description = $request->input('description');
        $task->user_id = 1;
        $task->save();

        return redirect()->back()->with('success', 'Задача успешно создана');
    }
}
