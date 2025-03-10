<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
               
        <!-- Font Awesome Solid + Brands -->
        <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/brands.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/solid.css') }}" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

    </head>

    <body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">

        <div class="flex h-screen">
            <!-- Sidebar -->
            
            <livewire:admin.sidebar />
    
            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col">
                <!-- Main Header -->
                <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
                    <!-- Search Bar -->
                    <div class="flex-1">
                        <input type="text" placeholder="Search..." class="w-full p-2 rounded-md bg-gray-700 text-white focus:outline-hidden">
                    </div>
    
                    <!-- User, Notifications, Dark Mode Toggle -->
                    <div class="flex items-center space-x-4">
                        <!-- User Dropdown -->
                        <div class="relative">
                            <button class="bg-gray-700 px-4 py-2 rounded-md hover:bg-gray-600">User</button>
                            <div class="absolute right-0 mt-2 w-40 bg-white text-gray-900 rounded-md shadow-lg hidden group-hover:block">
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Logout</a>
                            </div>
                        </div>
    
                        <!-- Notifications Dropdown -->
                        <div class="relative">
                            <button class="bg-gray-700 px-4 py-2 rounded-md hover:bg-gray-600">🔔</button>
                            <div class="absolute right-0 mt-2 w-48 bg-white text-gray-900 rounded-md shadow-lg hidden group-hover:block">
                                <p class="px-4 py-2">No new notifications</p>
                            </div>
                        </div>
    
                        <!-- Dark Mode Toggle -->
                        <div class="flex items-center">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" id="darkModeToggle" class="hidden">
                                <span class="bg-gray-700 w-10 h-5 flex items-center rounded-full p-1 duration-300 ease-in-out">
                                    <span class="bg-white w-4 h-4 rounded-full shadow-md transform transition-transform"></span>
                                </span>
                                <span class="text-sm">Dark Mode</span>
                            </label>
                        </div>
                    </div>
                </header>
    
                <!-- Main Content -->
                <main class="flex-1 p-6">
                    <div class="py-4">
                       <!-- Breadcrumb -->
                       <livewire:admin.breadcrumbs />
                       <h2 class="text-2xl font-bold">Welcome to the Dashboard</h2>
                    </div>
                    
                    <!-- Your main content goes here -->
                    {{ $slot }}
                </main>
    
                <!-- Footer -->
                <footer class="bg-gray-800 text-white p-4 text-center">
                    <p>Terms of Service | Privacy Policy</p>
                </footer>
            </div>
        </div>
    
        <script>
            const darkModeToggle = document.getElementById('darkModeToggle');
            const body = document.body;
    
            darkModeToggle.addEventListener('change', () => {
                body.classList.toggle('dark');
            });
        </script>
    
    @livewireScripts
    </body>

</html>