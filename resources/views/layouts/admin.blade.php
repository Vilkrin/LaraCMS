<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>
            @if (! empty($title))
                {{ $siteName }} - {{ $title }}
            @else
                {{ $siteName }}
            @endif
        </title> --}}

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
 
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->        
        @livewireStyles
        @fluxAppearance
        

  </head>

<body class="bg-slate-950 text-slate-100 font-exo overflow-x-hidden min-h-screen">
    <div class="flex w-full min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 min-h-screen bg-slate-900/50 border-r border-slate-700">
            <!-- Header -->
            <div class="p-4 border-b border-slate-700">
                <div class="flex items-center gap-2">
                    <svg class="h-8 w-8 text-amber-400 drop-shadow-[0_0_20px_rgba(251,191,36,0.3)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <div>
                        <h2 class="font-orbitron font-bold text-lg bg-linear-to-br from-amber-400 to-amber-500 bg-clip-text text-transparent">LaraCMS</h2>
                        <p class="text-xs text-slate-400">Admin Panel</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <x-admin.sidebar />

            <!-- Footer - Back to Main Site -->
            <div class="mt-auto border-t border-slate-700 p-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-amber-400 hover:bg-slate-800/50 hover:text-amber-300 transition-colors rounded-l-md border-r border-slate-700 hover:border-amber-400/60">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Back to Main Site
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col relative">
            <x-layouts::admin.header />
            
            <!-- Main Content -->
            <main class="flex-1 p-6 overflow-auto">

            {{ $slot }}

            </main>

        </div>
    </div>
            
 

     @livewireScripts
     @fluxScripts

    <script src="{{ asset('vendor/jquery/jquery-3.7.1.min.js') }}"></script>

  </body>

</html>