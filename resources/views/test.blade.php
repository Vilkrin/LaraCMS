<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
       
        <!-- Font Awesome Solid + Brands -->
        <link href="/resources/css/fontawesome.css" rel="stylesheet" />
        <link href="/resources/css/brands.css" rel="stylesheet" />
        <link href="/resources/css/solid.css" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->        
        @livewireStyles
        @fluxAppearance

    </head>
    <body class="dark antialiased min-h-screen h-full dark:bg-gray-800">
      <nav class="bg-gray-900 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo & Title -->
            <div class="flex items-center space-x-3">
                <img src="/logo.png" alt="Logo" class="h-8">
                <span class="text-xl font-bold">MySite</span>
            </div>
            
            <!-- Navigation Links -->
            <ul class="hidden md:flex space-x-6">
                <li><a href="#" class="hover:text-gray-300">Home</a></li>
                <li><a href="#" class="hover:text-gray-300">About</a></li>
                <li><a href="#" class="hover:text-gray-300">Services</a></li>
                <li><a href="#" class="hover:text-gray-300">Contact</a></li>
            </ul>
            
            <!-- Right-side Controls -->
            <div class="flex items-center space-x-4">
                <button class="hidden md:block bg-gray-700 px-3 py-1 rounded hover:bg-gray-600">Login</button>
                <button class="hidden md:block bg-blue-600 px-3 py-1 rounded hover:bg-blue-500">Register</button>
                
                <!-- Dark Mode Toggle -->
                <button class="p-2 bg-gray-800 rounded-full hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0112 21.75a9.75 9.75 0 01-9.75-9.75 9.72 9.72 0 016.748-9.252 7.5 7.5 0 1012.752 9.254z" />
                    </svg>
                </button>
                
                <!-- Dashboard Link -->
                <a href="#" class="hidden md:block bg-green-600 px-3 py-1 rounded hover:bg-green-500">Dashboard</a>
                
                <!-- User Dropdown -->
                <div class="relative">
                    <button class="flex items-center space-x-2 p-2 bg-gray-800 rounded-full hover:bg-gray-700">
                        <span>User</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div class="absolute right-0 mt-2 w-48 bg-white text-black rounded shadow-md hidden">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200">Settings</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200">Logout</a>
                    </div>
                </div>
            </div>
        </div>
      </nav>


      
      @livewireScripts
      @fluxScripts
    </body>
</html>