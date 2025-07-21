@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
            <svg class="mr-1 h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to task list
        </a>
    </div>

    <div class="overflow-hidden rounded-lg bg-white shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-base font-medium text-gray-900">{{ $task->title }}</h2>
                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium
                    @if($task->completed) bg-gray-100 text-gray-800 @else bg-gray-100 text-gray-800 @endif">
                    @if($task->completed) Completed @else Pending @endif
                </span>
            </div>
            <p class="mt-1 text-sm text-gray-500">
                Created {{ $task->created_at->diffForHumans() }} • Updated {{ $task->updated_at->diffForHumans() }}
            </p>
        </div>

        <div class="px-6 py-4 divide-y divide-gray-200">
            <div class="py-4">
                <h3 class="text-sm font-medium text-gray-700">Description</h3>
                <p class="mt-1 text-sm text-gray-600">{{ $task->description }}</p>
            </div>

            @if ($task->long_description)
                <div class="py-4">
                    <h3 class="text-sm font-medium text-gray-700">Details</h3>
                    <p class="mt-1 text-sm text-gray-600 whitespace-pre-line">{{ $task->long_description }}</p>
                </div>
            @endif
        </div>

        <div class="bg-gray-50 px-6 py-4 flex flex-wrap justify-end gap-3">
            <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn-secondary">
                    @if($task->completed)
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                        Mark Incomplete
                    @else
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Mark Complete
                    @endif
                </button>
            </form>

            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn-primary">
                <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>

            <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">
                    <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection
