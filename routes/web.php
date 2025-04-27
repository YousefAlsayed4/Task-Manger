<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// Display all tasks (paginated)
Route::get('/tasks', function () {
    return view('tasks.index', [
        'tasks' => Task::latest()->paginate(),
    ]);
})->name('tasks.index');

// Show a single task by its ID
Route::get('tasks/{task}', function (Task $task) {
    if (!$task) {
        abort(404);
    }
    return view('tasks.show', ['task' => $task]);
})->name('tasks.show');

// Show the create task form
Route::get('/task-form', function () {
    return view('tasks.create');
})->name('tasks.view');

// Handle create task form submission
Route::post('/task-form', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

// Show the edit form for a specific task
Route::get('/task/{task}/edit', function (Task $task) {
    if (!$task) {
        abort(404);
    }
    return view('tasks.edit', ['task' => $task]);
})->name('tasks.edit');

// Handle the edit task form submission
Route::put('/task/{task}/edit', function (TaskRequest $request, Task $task) {
    if (!$task) {
        abort(404);
    }

    $data = $request->validated();

    $task->update($data);

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

// Delete a specific task
Route::delete('/task/{task}', function (Task $task) {
    if (!$task) {
        abort(404);
    }
    $task->delete();
    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.delete');

// Mark task as completed or uncompleted
Route::put('/task/{task}/complete', function (Task $task) {
    if (!$task) {
        abort(404);
    }
    $task->completed = !$task->completed; 
    $task->save();
    return redirect()->back()
        ->with('success', 'Task completed successfully!');
})->name('tasks.complete');
