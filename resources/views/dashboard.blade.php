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
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <div class="min-h-screen py-8 px-4">
        <div class="mx-auto">
            <!-- Profile Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                <!-- Header with gradient -->
                <div class="relative h-40 bg-gradient-to-r from-primary-500 to-primary-700 dark:from-primary-700 dark:to-primary-900">
                    <div class="absolute inset-0 bg-black/10 dark:bg-black/20"></div>
                    <div class="absolute bottom-4 right-6">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/90 dark:bg-gray-800/90 text-primary-700 dark:text-primary-300 backdrop-blur-sm">
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
                            <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=0ea5e9&color=fff&size=128' }}"
                                 alt="Profile Photo"
                                 class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-white dark:border-gray-800 shadow-xl object-cover z-10 relative bg-white">
                            <div class="absolute -inset-2 bg-gradient-to-r from-primary-400 to-primary-600 rounded-full blur-md opacity-30"></div>
                        </div>

                        <div class="mt-4 md:mt-0 md:ml-6 text-center md:text-left flex-1">
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white">
                                {{ $user->first_name }} {{ $user->last_name }}
                            </h2>
                            <div class="mt-2 flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-2 sm:space-y-0">
                                <div class="flex items-center justify-center md:justify-start text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-envelope mr-2 text-primary-500"></i>
                                    <span>{{ $user->email }}</span>
                                </div>
                                <div class="flex items-center justify-center md:justify-start text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-phone mr-2 text-primary-500"></i>
                                    <span>{{ $user->phone }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="mt-8 border-t border-gray-200 dark:border-gray-700"></div>

                    <!-- Work Information Section -->
                    <div class="mt-8">
                        <div class="flex items-center mb-6">
                            <i class="fas fa-briefcase text-xl text-primary-500 mr-3"></i>
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Ish joyi ma'lumotlari</h3>
                        </div>

                        @forelse($user->infos as $info)
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 rounded-2xl p-5 mb-5 transition-all duration-300 hover:shadow-md border border-gray-200 dark:border-gray-700">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Department & Employment Form -->
                                    <div class="space-y-4">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-3">
                                                <i class="fas fa-building text-primary-600 dark:text-primary-400"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Bo'lim nomi</p>
                                                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $info->department_name }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-3">
                                                <i class="fas fa-file-contract text-primary-600 dark:text-primary-400"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Ish shakli</p>
                                                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $info->employmentForm }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Position & Status & Code -->
                                    <div class="space-y-4">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-3">
                                                <i class="fas fa-user-tie text-primary-600 dark:text-primary-400"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Lavozimi</p>
                                                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $info->staffPosition }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-3">
                                                <i class="fas fa-user-check text-primary-600 dark:text-primary-400"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Xodim holati</p>
                                                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $info->employeeStatus }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center mr-3">
                                                <i class="fas fa-code text-primary-600 dark:text-primary-400"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kod</p>
                                                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $info->code }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 rounded-2xl border border-gray-200 dark:border-gray-700">
                                <i class="fas fa-inbox text-4xl text-gray-400 dark:text-gray-500 mb-3"></i>
                                <p class="text-gray-600 dark:text-gray-400">Ish joyi ma'lumotlari mavjud emas.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Additional Info Section (if needed in the future) -->
            <div class="mt-6 text-center text-gray-500 dark:text-gray-400 text-sm">
                <p>Profil yangilandi: {{ now()->format('d.m.Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Dark Mode Toggle (for demonstration) -->
    <div class="fixed bottom-4 right-4">
        <button id="themeToggle" class="p-3 rounded-full bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-200">
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
