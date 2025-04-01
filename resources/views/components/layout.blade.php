<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
       
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->        
        @livewireStyles
        @fluxAppearance

    </head>
    <body class="h-full bg-white dark:bg-gray-900">
    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm w-full z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
              <!-- Left side - Logo and Title -->
              <div class="flex items-center">
                  <div class="flex-shrink-0">
                      <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=32&h=32&fit=crop&crop=faces" alt="Logo">
                  </div>
                  <div class="ml-3">
                      <span class="text-xl font-semibold text-gray-900 dark:text-white">{{ config('app.name', 'Laravel') }}</span>
                  </div>
              </div>

              <!-- Center - Menu -->
              <div class="hidden md:flex items-center space-x-8">
                  <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Home</a>
                  <a href="{{ url('/about') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">About</a>
                  <a href="{{ url('/blog') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Blog</a>
                  <a href="{{ url('/gallery') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Gallery</a>
                  <a href="{{ url('/contact') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Contact</a>
              </div>

              <!-- Right side - Auth buttons and dark mode toggle -->
              <div class="flex items-center space-x-4">
                  <button id="darkModeToggle" class="p-2 rounded-lg text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                      </svg>
                  </button>
                  
                    @if (Route::has('login'))
                        <nav class="flex items-center justify-end gap-4">
                            @auth
                                <a
                                    href="{{ url('/admin') }}"
                                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                                >
                                    Dashboard
                                </a>
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
                        </nav>
                    @endif
                
              </div>

              <!-- Mobile menu button -->
              <div class="md:hidden flex items-center">
                  <button type="button" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">
                      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                      </svg>
                  </button>
              </div>
          </div>
      </div>
  </nav>
    {{-- Main Content --}}
    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    
        {{ $slot }} 
              
    </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 shadow-sm mt-auto">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
              <div class="text-center">
                  <p class="text-sm text-gray-600 dark:text-gray-400">&copy; 2024 Your Name Photography</p>
              </div>
          </div>
      </footer>
  
      <script>
          // Dark mode toggle functionality
          const darkModeToggle = document.getElementById('darkModeToggle');
          const html = document.documentElement;
  
          // Check for saved dark mode preference
          if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
              html.classList.add('dark');
          } else {
              html.classList.remove('dark');
          }
  
          darkModeToggle.addEventListener('click', () => {
              html.classList.toggle('dark');
              localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
          });
      </script>

     @livewireScripts
     @fluxScripts
 </body>
</html>