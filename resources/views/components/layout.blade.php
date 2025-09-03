<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @hasSection('title')
            @yield('title') | {{ config('app.name', 'Laravel') }}
            @else
            {{ config('app.name', 'Laravel') }}
            @endif
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
 
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Cookiebot -->
        <script id="Cookiebot"
        src="https://consent.cookiebot.com/uc.js"
        data-cbid="{{ config('services.cookiebot.id') }}"
        data-blockingmode="{{ config('services.cookiebot.blocking_mode') }}"
        type="text/javascript"></script>


        <!-- Styles -->        
        @livewireStyles
        @fluxAppearance

    </head>
    <body class="h-full bg-white dark:bg-gray-900">
     <!-- Navigation -->
    <nav class="bg-gray-800/50 backdrop-blur-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-purple-500">{{ config('app.name') }}</span>
                </div>
                <div class="flex-1 flex justify-center">
                    <div class="flex space-x-8">
                        @if ($menu && $menu->items->where('parent_id', null)->count())
                            <ul>
                                @foreach ($menu->items->where('parent_id', null) as $item)
                                    <x-menu-item :item="$item" />
                                @endforeach
                            </ul>
                        @else
                            {{-- No menu items --}}
                        @endif
                    </div>
                </div>
                <div class="flex items-center">
                    
                    @if (Route::has('login'))
                        <div class="flex items-center justify-end gap-4">
                            @auth
                                <a
                                    href="{{ url('/admin') }}"
                                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                                >
                                    Dashboard
                                </a>
                                <livewire:user-menu />
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                                >
                                    Log in
                                </a>
        
                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main>
    
        {{ $slot }} 
              
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 border-t border-gray-700 mt-16">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo and About -->
                <div class="md:col-span-2">
                    <a href="/" class="flex items-center gap-2">
                        <span class="text-2xl font-bold text-purple-500">{{ config('app.name') }}</span>
                    </a>
                    <p class="mt-4 text-sm text-gray-400">
                        Join our community of passionate gamers and Twitch enthusiasts. Subscribe for exclusive content, join the discussions in our forum, or check out our merch store.
                    </p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-gray-400 hover:text-purple-500 transition-colors">
                            <i class="fab fa-twitch"></i>
                            <span class="sr-only">Twitch</span>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-red-500 transition-colors">
                            <i class="fab fa-youtube"></i>
                            <span class="sr-only">YouTube</span>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors">
                            <i class="fab fa-twitter"></i>
                            <span class="sr-only">Twitter</span>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-pink-500 transition-colors">
                            <i class="fab fa-instagram"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">
                            <i class="fab fa-discord"></i>
                            <span class="sr-only">Discord</span>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-purple-500">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-sm text-gray-400 hover:text-purple-500 transition">Home</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-purple-500 transition">Schedule</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-purple-500 transition">About</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-purple-500 transition">Discord</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-purple-500 transition">Merch</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-purple-500">Contact</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-2 text-sm text-gray-400">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:contact@vilkrin.uk" class="hover:underline hover:text-gray-200 transition">contact@vilkrin.uk</a>
                        </li>
                        <li class="text-sm text-gray-400">
                            For business inquiries, sponsorships or collaborations, please email us.
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom -->
            <div class="border-t border-gray-700 mt-10 pt-6 flex flex-col md:flex-row justify-between items-center">
                <p class="text-xs text-gray-400">
                    &copy; 2024 {{ config('app.name') }}. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-xs text-gray-400 hover:text-purple-500 transition">Terms of Service</a>
                    <a href="#" class="text-xs text-gray-400 hover:text-purple-500 transition">Privacy Policy</a>
                    <a href="#" class="text-xs text-gray-400 hover:text-purple-500 transition">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

     @livewireScripts
     @fluxScripts
 </body>
</html>