@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-blue-600">All Tasks</h2>

        <ul class="space-y-4">
            @foreach($tasks as $task)
                <li class="flex items-center justify-between bg-gray-100 p-4 rounded-md hover:shadow-md transition">
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                       @class(['text-lg font-bold', 'line-through text-gray-400' => $task->completed])>
                       {{ $task->title }}
                    </a>
                    @if(!$task->completed)
                        <span class="text-xs bg-yellow-400 text-white px-2 py-1 rounded-full">Pending</span>
                    @else
                        <span class="text-xs bg-green-400 text-white px-2 py-1 rounded-full">Completed</span>
                    @endif
                </li>
            @endforeach
        </ul>

        @if($tasks->count())
            <div class="mt-8">
                <div class="flex justify-center mt-4">
                    {{ $tasks->links('pagination::simple-tailwind') }}
                </div>
            </div>
        @else
            <p class="text-gray-500 mt-6">No tasks found. Let's add some!</p>
        @endif
    </div>
@endsection
