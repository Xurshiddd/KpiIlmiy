<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ilmiy sayt')</title>

    {{-- TailwindCSS (agar o‘rnatilgan bo‘lsa) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Filament bilan uyg‘un bo‘lishi uchun --}}
    @filamentStyles
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">

    {{-- Header --}}
    <nav class="bg-white dark:bg-gray-800 shadow-md p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-blue-600">KPI Ilmiy</a>
            <div class="flex gap-4">
                <a href="#" class="hover:underline">Profil</a>
                <a href="#" class="hover:underline">Chiqish</a>
            </div>
        </div>
    </nav>

    {{-- Asosiy kontent --}}
    <main class="max-w-7xl mx-auto p-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="text-center py-4 text-gray-500 border-t dark:border-gray-700 mt-10">
        &copy; {{ date('Y') }} KPI Ilmiy tizimi
    </footer>

    @filamentScripts
</body>
</html>
