<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
               
        <!-- Font Awesome Solid + Brands -->
        <link href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/brands.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/solid.css') }}" rel="stylesheet" />

        <!-- TinyMCE configuration and source script -->
        <x-head.tinymce-config/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

    </head>

    <body class="min-h-screen">

        <div class="antialiased bg-gray-50 dark:bg-gray-900"> 
            
            <!-- Dashboard Header -->

            <x-admin.dashboard-navbar>

            <!-- Dashboard Sidebar -->

            <x-admin.dashboard-sidebar>

                <!-- Your main content goes here -->

                <main class="p-4 md:ml-64 h-auto pt-20">

                {{ $slot }} 

                </main>
            
         </div>

    
    @livewireScripts
    </body>

</html>




