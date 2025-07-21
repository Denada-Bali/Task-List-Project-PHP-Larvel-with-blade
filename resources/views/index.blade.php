@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h2 class="text-base font-medium text-gray-900">Your Tasks</h2>
            <a href="{{ route('tasks.create') }}" class="btn-primary">
                <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                New Task
            </a>
        </div>
    </div>

    <ul class="divide-y divide-gray-200">
        @forelse ($tasks as $task)
            <li class="hover:bg-gray-50">
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="block px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            @if($task->completed)
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @else
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @endif
                            <p class="text-sm font-medium text-gray-900 @if($task->completed) line-through text-gray-500 @endif">
                                {{ $task->title }}
                            </p>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <time datetime="{{ $task->created_at->toDateTimeString() }}">{{ $task->created_at->diffForHumans() }}</time>
                            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                    @if($task->description)
                        <div class="mt-2 ml-8 text-sm text-gray-600">
                            {{ $task->description }}
                        </div>
                    @endif
                </a>
            </li>
        @empty
            <li class="px-6 py-12 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No tasks yet</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new task.</p>
                <div class="mt-6">
                    <a href="{{ route('tasks.create') }}" class="btn-primary">
                        <svg class="-ml-0.5 mr-1.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        New Task
                    </a>
                </div>
            </li>
        @endforelse
    </ul>

    @if ($tasks->count())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $tasks->links() }}
        </div>
    @endif
@endsection
