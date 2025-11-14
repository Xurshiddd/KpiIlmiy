<!DOCTYPE html><!DOCTYPE html>

<html lang="uz"><html lang="uz">

<head><head>

    <meta charset="UTF-8">    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Ilmiy sayt')</title>    <title>@yield('title', 'Ilmiy sayt')</title>



    {{-- TailwindCSS (agar o'rnatilgan bo'lsa) --}}    {{-- TailwindCSS (agar o'rnatilgan bo'lsa) --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])    @vite(['resources/css/app.css', 'resources/js/app.js'])



    {{-- Alpine.js --}}    {{-- Alpine.js --}}

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>



    {{-- Filament bilan uyg'un bo'lishi uchun --}}    {{-- Filament bilan uyg'un bo'lishi uchun --}}

    @filamentStyles    @filamentStyles

</head></head>

<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100"><body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100" x-data="toastManager()">>

<html lang="uz">

    {{-- Toast Notifications Container --}}<head>

    <div id="toast-container" class="fixed top-6 right-6 z-50 space-y-3"></div>    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Header --}}    <title>@yield('title', 'Ilmiy sayt')</title>

    <nav class="bg-white dark:bg-gray-800 shadow-md p-4">

        <div class="max-w-7xl mx-auto flex justify-between items-center">    {{-- TailwindCSS (agar o‘rnatilgan bo‘lsa) --}}

            <a href="/" class="text-xl font-bold text-blue-600">KPI Ilmiy</a>    @vite(['resources/css/app.css', 'resources/js/app.js'])

            <div class="flex gap-4">

                <a href="#" class="hover:underline">Profil</a>    {{-- Filament bilan uyg‘un bo‘lishi uchun --}}

                <a href="#" class="hover:underline">Chiqish</a>    @filamentStyles

            </div></head>

        </div><body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">

    </nav>

    {{-- Header --}}

    {{-- Asosiy kontent --}}    <nav class="bg-white dark:bg-gray-800 shadow-md p-4">

    <main class="max-w-7xl mx-auto p-6">        <div class="max-w-7xl mx-auto flex justify-between items-center">

        @yield('content')            <a href="/" class="text-xl font-bold text-blue-600">KPI Ilmiy</a>

    </main>            <div class="flex gap-4">

                <a href="#" class="hover:underline">Profil</a>

    {{-- Footer --}}                <a href="#" class="hover:underline">Chiqish</a>

    <footer class="text-center py-4 text-gray-500 border-t dark:border-gray-700 mt-10">            </div>

        &copy; {{ date('Y') }} KPI Ilmiy tizimi        </div>

    </footer>    </nav>



    {{-- Toast Script --}}    {{-- Asosiy kontent --}}

    <script>    <main class="max-w-7xl mx-auto p-6">

        class Toast {        @yield('content')

            static show(message, type = 'info', duration = 5000) {    </main>

                const container = document.getElementById('toast-container');

                    {{-- Footer --}}

                // Type ranglar    <footer class="text-center py-4 text-gray-500 border-t dark:border-gray-700 mt-10">

                const typeStyles = {        &copy; {{ date('Y') }} KPI Ilmiy tizimi

                    success: {    </footer>

                        bg: 'bg-green-100',

                        border: 'border-green-400',    @filamentScripts

                        text: 'text-green-700',</body>

                        icon: '✓'</html>

                    },
                    error: {
                        bg: 'bg-red-100',
                        border: 'border-red-400',
                        text: 'text-red-700',
                        icon: '✕'
                    },
                    warning: {
                        bg: 'bg-yellow-100',
                        border: 'border-yellow-400',
                        text: 'text-yellow-700',
                        icon: '⚠'
                    },
                    info: {
                        bg: 'bg-blue-100',
                        border: 'border-blue-400',
                        text: 'text-blue-700',
                        icon: 'ℹ'
                    }
                };

                const style = typeStyles[type] || typeStyles.info;

                const toast = document.createElement('div');
                toast.className = `${style.bg} border ${style.border} ${style.text} px-4 py-3 rounded shadow-lg animate-pulse`;
                toast.innerHTML = `
                    <div class="flex items-start">
                        <span class="font-bold mr-3">${style.icon}</span>
                        <span>${message}</span>
                        <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-lg leading-none">&times;</button>
                    </div>
                `;

                container.appendChild(toast);

                // Avtomatik o'chiriladi 5 soniyadan keyin
                setTimeout(() => {
                    toast.classList.add('animate-fade-out');
                    setTimeout(() => toast.remove(), 300);
                }, duration);
            }

            static success(message, duration = 5000) {
                this.show(message, 'success', duration);
            }

            static error(message, duration = 5000) {
                this.show(message, 'error', duration);
            }

            static warning(message, duration = 5000) {
                this.show(message, 'warning', duration);
            }

            static info(message, duration = 5000) {
                this.show(message, 'info', duration);
            }
        }

        // Session flash messages (success/error)
        @if (session('success'))
            Toast.success("{{ session('success') }}", 5000);
        @endif

        @if (session('error'))
            Toast.error("{{ session('error') }}", 5000);
        @endif

        // Validation errors
        @if ($errors->any())
            const errorMessages = {!! json_encode($errors->all()) !!};
            errorMessages.forEach(error => {
                Toast.error(error, 5000);
            });
        @endif
    </script>

    {{-- Fade out animation --}}
    <style>
        @keyframes fadeOut {
            0% {
                opacity: 1;
                transform: translateX(0);
            }
            100% {
                opacity: 0;
                transform: translateX(100%);
            }
        }

        .animate-fade-out {
            animation: fadeOut 0.3s ease-in-out forwards;
        }
    </style>

    @filamentScripts
</body>
</html>
