<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Label;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {   
        if (auth()->check()) 
        {
            $user_id = auth()->id();
            $tasks = Task::where(['is_active' => 1, 'user_id' => $user_id])->with(['label'])->paginate(8); 
            $closedTasks = Task::where(['is_active' => 0, 'user_id' => $user_id])->with(['label'])->paginate(8);
        }
        else
        {
            $tasks = Task::where(['is_active' => 1])->with(['label'])->paginate(8);
            $closedTasks = Task::where(['is_active' => 0])->with(['label'])->paginate(8);
        }
        return view('todo.index', ['tasks' => $tasks, 'closedTasks' => $closedTasks]);
    }
    public function show($id)
    {
        $task = Task::where(['id' => $id])->with(['label'])->firstOrFail();
        return view('todo.detail', ['task' => $task]);
    }


    public function changeActivity(Request $request)
    {   
        $this->validate($request, [
            'task_id' => 'required|integer',
        ]);

        $task = Task::where(['id' => $request->task_id])->firstOrFail();

        if (auth()->id() != $task->user_id) 
            return redirect()->route('task.list')->with('error', 'Вы не можете закрывать чужие задачи');
        
        $task->is_active = !$task->is_active;
        $task->save();

        return redirect()->route('task.list')->with('success', 'Вы успешно закрыли свою задачу');
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
        $task->user_id = auth()->id();
        $task->save();

        return redirect()->back()->with('success', 'Задача успешно создана');
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'task_id' => 'required|integer',
        ]);

        $task = Task::where(['id' => $request->task_id, 'user_id' => auth()->id()])->with(['label'])->firstOrFail();
        $task->label()->detach();

        $task->delete();

        return redirect()->route('task.list')->with('success', 'Задача успешно удалена');
    }

    public function edit($id)
    {

        $task = Task::where(['id' => $id])->with(['label'])->firstOrFail();

        $labels = Label::get();
        
        return view('todo.edit', [
            'task' => $task,
            'labels' => $labels,
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'label' => 'required|integer',
        ]);

        $label = Label::where(['id' => $request->label]);
        
        $task = Task::where(['id' => $request->task_id, 'user_id' => auth()->id()])->firstOrFail();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->label()->sync($request->label);
        $task->save();
        return redirect()->route('task.list')->with('success', 'Задача успешно Обновлена');
    }
}
