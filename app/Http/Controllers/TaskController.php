<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * retrive user's tasks
     * @return view
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * create task page
     * @return view
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * @param $task
     * view a single task
     * @return view
     */
    public function view(Task $task)
    {
        return view('tasks.view', compact('task'));
    }

    /**
     * @param $request
     * store a task
     * @return Redirect
     */
    public function store(TaskCreateRequest $request)
    {
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * @param $task
     * edit a task
     * @return view
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * @param $request
     * @param $task
     * update a task
     * @return redirect
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $validatedData = [
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ];
        $task->update($validatedData);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * @param $task
     * delete a task
     * @return redirect
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    /**
     * @param $request
     * @param $task
     * update status of a task
     * @return response
     */
    public function updateStatus(Request $request, Task $task)
    {
        $task->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }

}
