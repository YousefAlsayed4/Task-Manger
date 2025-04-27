@extends('layouts.app')

@section('title', "Task: $task->title")

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg space-y-6">
        <h2 class="text-3xl font-bold text-blue-600">{{ $task->title }}</h2>

        <p class="text-gray-700">
            <strong>Description:</strong> {{ $task->description }}
        </p>

        <p class="text-gray-500">
            <strong>Details:</strong> {{ $task->long_description }}
        </p>

        <div>
            <span class="text-sm font-semibold {{ $task->completed ? 'text-green-600' : 'text-red-500' }}">
                {{ $task->completed ? 'Completed ✅' : 'Pending ⏳' }}
            </span>
        </div>

        <div class="flex flex-wrap gap-4 mt-6">
            <!-- Complete / Incomplete -->
            <form method="post" action="{{ route('tasks.complete', ['task' => $task->id]) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-md font-semibold">
                    {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Completed' }}
                </button>
            </form>

            <!-- Edit -->
            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md font-semibold">
                Edit Task
            </a>

            <!-- Delete -->
            <form action="{{ route('tasks.delete', ['task' => $task->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-md font-semibold">
                    Delete
                </button>
            </form>
        </div>

        <div class="mt-8">
            <a href="{{ url('/tasks') }}" class="text-blue-600 hover:underline text-sm">← Back to all tasks</a>
        </div>
    </div>
@endsection
