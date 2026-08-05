<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager App</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans text-gray-800">

    <nav class="bg-indigo-600 text-white shadow-md mb-8">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('contacts.index') }}" class="text-xl font-bold tracking-wide">
                📇 ContactApp
            </a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4">
        {{-- Flash Message Success --}}
        @if (session('success'))
        <div
            class="mb-6 p-4 bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 rounded-r shadow-sm flex items-center justify-between">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="text-emerald-700 font-bold ml-4">&times;</button>
        </div>
        @endif

        @yield('content')
    </main>

</body>

</html>