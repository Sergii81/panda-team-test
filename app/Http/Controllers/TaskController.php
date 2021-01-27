<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks = Task::paginate(3);

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addForm()
    {
        return view('tasks.add-form');
    }

    /**
     * @param AddTaskRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(AddTaskRequest $request): \Illuminate\Http\RedirectResponse
    {
        $task = new Task;
        $task->fill($request->all());
        $task->save();

        return redirect()->route('index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editForm($id)
    {
        $task = Task::where('id', $id)->first();

        return view('tasks.edit-form', [
            'task' => $task
        ]);
    }

    /**
     * @param EditTaskRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(EditTaskRequest $request)
    {
        $task = Task::where('id', $request->id)->first();
        $task->text = $request->text;
        $task->status = $request->status ? $request->status : 0;
        $task->save();

        return redirect()->route('index');

    }


}
