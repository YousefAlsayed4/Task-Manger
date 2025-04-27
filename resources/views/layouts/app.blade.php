<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tasks App')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 text-gray-800">

    <!-- Navbar -->
    <header class="bg-blue-600 shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">
                <a href="{{ url('/tasks') }}">📋 Task Manager</a>
            </h1>
            <a href="{{ url('/task-form') }}" class="bg-white text-blue-600 font-semibold py-2 px-4 rounded-full shadow hover:bg-gray-100 transition">
                + Add Task
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-10">
        @yield('content')
    </main>

    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg animate-bounce">
            {{ session('success') }}
        </div>
    @endif

</body>
</html>
