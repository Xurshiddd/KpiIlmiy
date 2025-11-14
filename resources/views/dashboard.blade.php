<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil sahifasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                        }
                    }
                }
            }
        }
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    {{-- Toast Notifications Container --}}
    <div id="toast-container" class="fixed top-6 right-6 z-50 space-y-3"></div>

    <div class="min-h-screen py-8 px-4">
        <div class="mx-auto">
            <!-- Profile Card -->
            <script>
                class Toast {
                    static show(message, type = 'info', duration = 5000) {
                        const container = document.getElementById('toast-container');

                        // Type ranglar
                        const typeStyles = {
                            success: {
                                bg: 'bg-green-100',
                                border: 'border-green-400',
                                text: 'text-green-700',
                                icon: '✓'
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
                        toast.className = `${style.bg} border ${style.border} ${style.text} px-4 py-3 rounded shadow-lg`;
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

                // Session flash messages (success/error) - 5 soniya ko'rsatiladi
                @if (session('success'))
                    Toast.success("{{ session('success') }}", 5000);
                @endif

                @if (session('error'))
                    Toast.error("{{ session('error') }}", 5000);
                @endif

                // Validation errors - 5 soniya ko'rsatiladi
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
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                <!-- Header with gradient -->
                <div
                    class="relative h-40 bg-gradient-to-r from-primary-500 to-primary-700 dark:from-primary-700 dark:to-primary-900">
                    <div class="absolute inset-0 bg-black/10 dark:bg-black/20">

                    </div>
                    <div class="absolute bottom-4 right-6 flex items-center">
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/90 dark:bg-gray-800/90 text-primary-700 dark:text-primary-300 backdrop-blur-sm">
                            <i class="fas fa-user-circle mr-1"></i>
                            {{ ucfirst($user->type) }}
                        </span>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="px-6 pb-8 relative">
                    <!-- Profile Image and Basic Info -->
                    <div class="flex flex-col md:flex-row items-center -mt-20 md:-mt-16">
                        <div class="relative">
                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=0ea5e9&color=fff&size=128' }}"
                                alt="Profile Photo"
                                class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-white dark:border-gray-800 shadow-xl object-cover z-10 relative bg-white">
                            <div
                                class="absolute -inset-2 bg-gradient-to-r from-primary-400 to-primary-600 rounded-full blur-md opacity-30">
                            </div>
                        </div>

                        <div class="mt-4 md:mt-0 md:ml-6 text-center md:text-left flex-1">
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white">
                                {{ $user->first_name }} {{ $user->last_name }}
                            </h2>
                            <div
                                class="mt-2 flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-2 sm:space-y-0">
                                <div
                                    class="flex items-center justify-center md:justify-start text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-envelope mr-2 text-primary-500"></i>
                                    <span>{{ $user->email }}</span>
                                </div>
                                <div
                                    class="flex items-center justify-center md:justify-start text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-phone mr-2 text-primary-500"></i>
                                    <span>{{ $user->phone }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" style="cursor: pointer!important;"
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 backdrop-blur-sm ml-2">
                                <i class="fas fa-sign-out-alt mr-1"></i>
                                Chiqish
                            </button>
                        </form>
                    </span>
                    <!-- Divider -->
                    <div class="mt-8 border-t border-gray-200 dark:border-gray-700">
                    </div>

                    <!-- Work Information Section -->
                    <div class="mt-8">
                        <div class="flex items-center mb-6">
                            <i class="fas fa-briefcase text-xl text-primary-500 mr-3"></i>
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Ish joyi ma'lumotlari</h3>
                        </div>

                        @forelse($user->infos as $info)
                            <div
                                class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 rounded-2xl p-5 mb-5 transition-all duration-300 hover:shadow-md border border-gray-200 dark:border-gray-700">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Department & Employment Form -->
                                    <div class="space-y-4">
                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-3">
                                                <i class="fas fa-building text-primary-600 dark:text-primary-400"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Bo'lim
                                                    nomi</p>
                                                <p class="font-semibold text-gray-800 dark:text-gray-200">
                                                    {{ $info->department_name }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-3">
                                                <i
                                                    class="fas fa-file-contract text-primary-600 dark:text-primary-400"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Ish
                                                    shakli</p>
                                                <p class="font-semibold text-gray-800 dark:text-gray-200">
                                                    {{ $info->employmentForm }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Position & Status & Code -->
                                    <div class="space-y-4">
                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-3">
                                                <i class="fas fa-user-tie text-primary-600 dark:text-primary-400"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Lavozimi
                                                </p>
                                                <p class="font-semibold text-gray-800 dark:text-gray-200">
                                                    {{ $info->staffPosition }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-3">
                                                <i class="fas fa-user-check text-primary-600 dark:text-primary-400"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Xodim
                                                    holati</p>
                                                <p class="font-semibold text-gray-800 dark:text-gray-200">
                                                    {{ $info->employeeStatus }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-3">
                                                <i class="fas fa-code text-primary-600 dark:text-primary-400"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kod</p>
                                                <p class="font-semibold text-gray-800 dark:text-gray-200">
                                                    {{ $info->code }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div
                                class="text-center py-8 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 rounded-2xl border border-gray-200 dark:border-gray-700">
                                <i class="fas fa-inbox text-4xl text-gray-400 dark:text-gray-500 mb-3"></i>
                                <p class="text-gray-600 dark:text-gray-400">Ish joyi ma'lumotlari mavjud emas.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl mt-6">
                <!-- tab card -->
                <div class="px-6 py-4" id="profileTabs">
                    <div class="border-b border-gray-200 dark:border-gray-700">
                        <nav class="-mb-px flex space-x-6" aria-label="Tabs" role="tablist">
                            <button role="tab" data-tab="overview"
                                class="py-2 px-3 border-b-2 border-primary-500 text-primary-600 font-medium text-sm"
                                aria-selected="true">Maqsad ko'rsatkichlar</button>
                            <button role="tab" data-tab="activities"
                                class="py-2 px-3 text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200"
                                aria-selected="false">Activities</button>
                            <button role="tab" data-tab="settings"
                                class="py-2 px-3 text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200"
                                aria-selected="false">Settings</button>
                        </nav>
                    </div>

                    <div class="mt-4">
                        <div data-content="overview" class="">
                            <p class="text-gray-600 dark:text-gray-400">Qo'shimcha ma'lumotlar uchun bo'lim tanlang.
                            </p>
                            <!-- Example overview content -->
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div
                                    class="p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                                    @foreach ($user->targetIndicators as $indicator)
                                        <p class="font-semibold text-gray-800 dark:text-gray-200 mt-2">
                                            {{ $indicator->name }}</p>
                                        <hr>
                                        <form action="" class="m-3">
                                            @csrf
                                            <input type="file" name="target_indicator_{{ $indicator->id }}">
                                            <button
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Yuklash</button>
                                        </form>
                                    @endforeach
                                </div>
                                <div
                                    class="p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ now()->format('Y') - 1 }} -
                                        Yil</p>
                                    <p class="font-semibold text-gray-800 dark:text-gray-200 mt-2">34</p>
                                </div>
                                <div
                                    class="p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ now()->format('Y') }} - Yil
                                    </p>
                                    <p class="font-semibold text-gray-800 dark:text-gray-200 mt-2">34</p>
                                </div>
                            </div>
                        </div>

                        <div data-content="activities" class="hidden">
                            <!-- Example activities list -->
                            @foreach ($user->targetIndicators as $indicator)
                                <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                                    {{ $indicator->name }}</h2>


                                <ul class="space-y-3">
                                    @for ($i = 1; $i < 5; $i++)
                                        {{-- @foreach ($user->targetIndicators->tasks as $task) --}}
                                        <h3 class="text-gray-600 dark:text-gray-400">{{ $i }} - chorak</h3>
                                        <li
                                            class="p-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                                            <div class="flex flex-col md:flex-row items-center md:items-start gap-4">
                                                <div x-data="{ open: false }" class="w-full md:w-1/3 flex items-center justify-center">
                                                    <button @click="open = true"
                                                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                        Rejadagi fayllarni yuklash
                                                    </button>

                                                    <!-- Modal -->
                                                    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
                                                        <div class="fixed inset-0 bg-black/50" @click="open = false" aria-hidden="true"></div>

                                                        <div @click.away="open = false" @keydown.escape.window="open = false" x-trap="open"
                                                            role="dialog" aria-modal="true"
                                                            class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-lg mx-4 p-6 z-50">
                                                            <div class="flex justify-between items-center mb-4">
                                                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                                                    Reja uchun fayllarni yuklash — {{ $indicator->name }} ({{ $i }}-chorak)
                                                                </h3>
                                                                <button type="button" @click="open = false"
                                                                    class="text-gray-500 hover:text-gray-700 dark:text-gray-300 text-2xl leading-none">&times;</button>
                                                            </div>

                                                            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                                                @csrf
                                                                <input type="hidden" name="quarter" value="{{ $i }}">

                                                                <div>
                                                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                                        Sarlavha <span class="text-red-500">*</span>
                                                                    </label>
                                                                    <input type="text" name="title" required
                                                                        class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-400 dark:focus:ring-primary-600"
                                                                        placeholder="Maqola sarlavhasi">
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mazmuni</label>
                                                                    <textarea name="content" rows="4"
                                                                        class="mt-1 block w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-400 dark:focus:ring-primary-600"
                                                                        placeholder="Maqola mazmuni"></textarea>
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                                        Maqola (PDF) <span class="text-red-500">*</span>
                                                                    </label>
                                                                    <div class="mt-2">
                                                                        <input type="file" name="filesDoc" accept=".pdf" required
                                                                            class="w-full text-sm text-gray-700 dark:text-gray-300 file:border file:rounded-md file:px-4 file:py-2 file:bg-white dark:file:bg-gray-800 file:border-gray-300 dark:file:border-gray-700 file:text-sm file:font-medium hover:file:bg-gray-50">
                                                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Faqat PDF formatda yuklang.</p>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rasm fayli (ixtiyoriy)</label>
                                                                    <div class="mt-2">
                                                                        <input type="file" name="filesImg" accept="image/*"
                                                                            class="w-full text-sm text-gray-700 dark:text-gray-300 file:border file:rounded-md file:px-4 file:py-2 file:bg-white dark:file:bg-gray-800 file:border-gray-300 dark:file:border-gray-700 file:text-sm file:font-medium hover:file:bg-gray-50">
                                                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Rasm (jpg, png, webp) — ixtiyoriy.</p>
                                                                    </div>
                                                                </div>

                                                                <div class="flex justify-end items-center gap-3 pt-2">
                                                                    <button type="button" @click="open = false"
                                                                        class="inline-flex items-center px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none">
                                                                        Bekor qilish
                                                                    </button>
                                                                    <button type="submit"
                                                                        class="inline-flex items-center px-4 py-2 rounded-lg bg-primary-600 hover:bg-primary-700 text-white focus:outline-none shadow-sm">
                                                                        Yuklash
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <style>[x-cloak]{display:none !important}</style>
                                                </div>
                                                <div
                                                    class="w-full md:w-1/3 text-sm text-gray-700 dark:text-gray-300 border-gray-200 dark:border-gray-700 rounded overflow-hidden shadow-lg p-5">
                                                    Reja bo'yicha: <span
                                                        @php
                                                            $count = \DB::table('tasks')->where('target_indicator_id', $indicator->id)->where('quarter', $i)->count(); @endphp
                                                        class="font-semibold text-gray-800 dark:text-gray-200">{{ $count }}</span>
                                                    ta malumot yuklash kerak
                                                </div>
                                                <div
                                                    class="w-full md:w-1/3 text-center md:text-right text-sm text-gray-600 dark:text-gray-400 border-gray-200 dark:border-gray-700 rounded overflow-hidden shadow-lg p-5">
                                                    column
                                                </div>
                                            </div>
                                        </li>
                                        {{-- @endforeach --}}
                                    @endfor
                                </ul>
                            @endforeach
                        </div>

                        <div data-content="settings" class="hidden">
                            <!-- Example simple settings form -->
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm text-gray-600 dark:text-gray-400">Telefon</label>
                                    <input type="text" name="phone"
                                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-md text-gray-800 dark:text-gray-200"
                                        value="{{ $user->phone }}" disabled>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 dark:text-gray-400">Email</label>
                                    <input type="email" name="email"
                                        class="mt-1 block w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-md text-gray-800 dark:text-gray-200"
                                        value="{{ $user->email }}" disabled>
                                </div>
                                <div class="flex items-center">
                                    <button type="button"
                                        class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-md text-sm">Tahrirlash</button>
                                    <button type="button"
                                        class="ml-3 inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md text-sm">Saqlash</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <script>
                        (function() {
                            const container = document.getElementById('profileTabs');
                            if (!container) return;
                            const tabs = container.querySelectorAll('[data-tab]');
                            const panes = container.querySelectorAll('[data-content]');

                            function activate(name) {
                                tabs.forEach(btn => {
                                    const isActive = btn.getAttribute('data-tab') === name;
                                    btn.classList.toggle('border-b-2', isActive);
                                    btn.classList.toggle('border-primary-500', isActive);
                                    btn.classList.toggle('text-primary-600', isActive);
                                    btn.classList.toggle('font-medium', isActive);
                                    btn.classList.toggle('text-gray-500', !isActive);
                                    btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
                                });
                                panes.forEach(p => {
                                    p.classList.toggle('hidden', p.getAttribute('data-content') !== name);
                                });
                            }

                            tabs.forEach(btn => {
                                btn.addEventListener('click', () => {
                                    activate(btn.getAttribute('data-tab'));
                                });
                            });

                            // default
                            activate('overview');
                        })();
                    </script>
                </div>
            </div>
            <!-- Additional Info Section (if needed in the future) -->
            <div class="mt-6 text-center text-gray-500 dark:text-gray-400 text-sm">
                <p>Profil yangilandi: {{ now()->format('d.m.Y') }}</p>
            </div>
        </div>
    </div>

    <div class="fixed bottom-4 right-4">
        <button id="themeToggle"
            class="p-3 rounded-full bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-200">
            <i class="fas fa-moon dark:hidden"></i>
            <i class="fas fa-sun hidden dark:block"></i>
        </button>
    </div>

    <script>
        // Simple dark mode toggle for demonstration
        document.getElementById('themeToggle').addEventListener('click', function() {
            document.documentElement.classList.toggle('dark');
        });
    </script>
</body>

</html>
