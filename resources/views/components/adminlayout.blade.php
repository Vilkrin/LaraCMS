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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        {{-- @livewireStyles --}}
    </head>
<body class="bg-gray-100">

  <!-- Sidebar -->
  <div class="flex">
    <div class="w-64 bg-gray-800 h-screen text-white">
      <div class="p-4 text-2xl font-semibold">
        Admin Dashboard
      </div>
      <nav class="mt-5">
            {{-- <x-nav-link href="">Home</x-nav-link>
            <x-nav-link href="/about">About</x-nav-link>
            <x-nav-link href="/blog/">Blog</x-nav-link>
            <x-nav-link href="/gallery/">Gallery</x-nav-link>
            <x-nav-link href="/contact">Contact</x-nav-link> --}}
            <a href="#" class="block py-2.5 px-4 text-sm hover:bg-gray-700">Dashboard</a>
            <a href="#" class="block py-2.5 px-4 text-sm hover:bg-gray-700">Users</a>
            <a href="#" class="block py-2.5 px-4 text-sm hover:bg-gray-700">Settings</a>
            <a href="#" class="block py-2.5 px-4 text-sm hover:bg-gray-700">Reports</a>
            <a href="#" class="block py-2.5 px-4 text-sm hover:bg-gray-700">Logout</a>
          </nav>
        </div>


    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col">
      
        <!-- Top Bar -->
        <header class="bg-white shadow p-4">
          <div class="flex justify-between items-center">
            <h1 class="text-xl font-semibold">Dashboard Overview</h1>
            
            <!-- Right side (Notifications & User Menu) -->
            <div class="flex items-center space-x-4">
              <!-- Notifications Dropdown -->
              <div class="relative">
                <button id="notificationButton" class="relative focus:outline-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0018 15V11a6 6 0 10-12 0v4a2.032 2.032 0 00-.595 1.405L4 17h5m1 4h4m-6 0a2 2 0 004 0" />
                  </svg>
                  <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">3</span>
                </button>
                <!-- Dropdown Menu -->
                <div id="notificationMenu" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-md shadow-lg z-20">
                  <div class="py-2">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">New user registered</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Server down for maintenance</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">New sale: $1200</a>
                  </div>
                </div>
              </div>
  
              <!-- User Profile Menu -->
              <div class="relative">
                <button id="userButton" class="focus:outline-none flex items-center space-x-2">
                  <img src="https://i.pravatar.cc/40" alt="User Avatar" class="w-8 h-8 rounded-full">
                  <span class="text-gray-700 font-medium">John Doe</span>
                </button>
                <!-- Dropdown Menu -->
                <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20">
                  <div class="py-2">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>

       {{ $slot }}

        </div>
    </div>

      <!-- JavaScript for Dropdowns -->
  <script>
    const notificationButton = document.getElementById('notificationButton');
    const notificationMenu = document.getElementById('notificationMenu');
    const userButton = document.getElementById('userButton');
    const userMenu = document.getElementById('userMenu');

    notificationButton.addEventListener('click', () => {
      notificationMenu.classList.toggle('hidden');
    });

    userButton.addEventListener('click', () => {
      userMenu.classList.toggle('hidden');
    });

    // Close dropdowns when clicking outside
    window.addEventListener('click', (e) => {
      if (!notificationButton.contains(e.target)) {
        notificationMenu.classList.add('hidden');
      }
      if (!userButton.contains(e.target)) {
        userMenu.classList.add('hidden');
      }
    });
  </script>

    </body>
</html>