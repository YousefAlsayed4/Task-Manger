@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create Task')

@section('content')
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-blue-600">{{ isset($task) ? 'Edit Task' : 'Create a New Task' }}</h2>

        <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST" class="space-y-6">
            @csrf
            @isset($task)
                @method('PUT')
            @endisset

            <div>
                <label for="title" class="block mb-1 text-gray-700 font-medium">Task Title</label>
                <input type="text" name="title" id="title"
                    value="{{ $task->title ?? old('title') }}"
                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:border-blue-400" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block mb-1 text-gray-700 font-medium">Short Description</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:border-blue-400">{{ $task->description ?? old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="long_description" class="block mb-1 text-gray-700 font-medium">Long Description</label>
                <input type="text" name="long_description" id="long_description"
                    value="{{ $task->long_description ?? old('long_description') }}"
                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:border-blue-400">
                @error('long_description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-semibold">
                    {{ isset($task) ? 'Update Task' : 'Create Task' }}
                </button>
            </div>
        </form>
    </div>
@endsection
