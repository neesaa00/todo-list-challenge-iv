<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Task::class);

        $validated = $request->validate([
            'title' => 'required|string',
        ]);

        $task = new Task();
        $task->title = $validated['title'];
        $task->user()->associate($request->user());
        $task->save();

        return back(303);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $task)
    {
        $currentTask = Task::find($task);

        $this->authorize('update', $currentTask);

        $validated = $request->validate([
            'is_completed' => 'required|boolean',
        ]);

        $currentTask->is_completed = $validated['is_completed'];

        return back(303);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        $task->delete();

        return back(303);
    }
}
