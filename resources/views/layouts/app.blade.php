<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 Task List App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
    @yield('styles')
</head>

<body class="min-h-full font-sans antialiased">
    <div class="min-h-full">
        <header class="bg-white shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <h1 class="text-lg font-medium text-gray-900">@yield('title')</h1>
                    <div class="flex space-x-4">
                        <a href="{{ route('tasks.index') }}" class="text-gray-500 hover:text-gray-700">Tasks</a>
                        <a href="{{ route('tasks.create') }}" class="text-gray-500 hover:text-gray-700">New Task</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">
            <div x-data="{ flash: true }">
                @if (session()->has('success'))
                    <div x-show="flash" x-transition class="relative mb-6 rounded-md bg-blue-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-blue-800">{{ session('success') }}</p>
                            </div>
                            <div class="ml-auto pl-3">
                                <div class="-mx-1.5 -my-1.5">
                                    <button @click="flash = false" type="button" class="inline-flex rounded-md bg-blue-50 p-1.5 text-blue-500 hover:bg-blue-100">
                                        <span class="sr-only">Dismiss</span>
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="overflow-hidden rounded-lg bg-white shadow">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
