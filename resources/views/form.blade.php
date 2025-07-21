@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <div class="px-6 py-4">
        <form method="POST"
              action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"
              class="space-y-6">
            @csrf
            @isset($task)
                @method('PUT')
            @endisset

            <div class="space-y-2">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title"
                       class="input-field @error('title') border-red-300 @enderror"
                       value="{{ $task->title ?? old('title') }}"
                       placeholder="Task title">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="3"
                          class="input-field @error('description') border-red-300 @enderror"
                          placeholder="A brief description...">{{ $task->description ?? old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="long_description" class="block text-sm font-medium text-gray-700">Details</label>
                <textarea id="long_description" name="long_description" rows="5"
                          class="input-field @error('long_description') border-red-300 @enderror"
                          placeholder="Additional details (optional)">{{ $task->long_description ?? old('long_description') }}</textarea>
                @error('long_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4">
                <a href="{{ route('tasks.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    @isset($task)
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Update Task
                    @else
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Task
                    @endisset
                </button>
            </div>
        </form>
    </div>
@endsection
