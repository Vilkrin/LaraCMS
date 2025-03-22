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
        @fluxAppearance



    </head>

    <body class="min-h-screen bg-white dark:bg-zinc-800">

            <!-- Sidebar -->
            
            {{-- <livewire:admin.sidebar /> --}}


            <flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
                <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
        
                <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="px-2 dark:hidden" />
                <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc." class="px-2 hidden dark:flex" />
        
                <flux:input as="button" variant="filled" placeholder="Search..." icon="magnifying-glass" />
        
                <flux:navlist variant="outline">
                    <flux:navlist.item icon="home" href="{{ route('admin.dashboard') }}" current>Dashboard</flux:navlist.item>
                    <flux:navlist.item icon="user-group" href="{{ route('admin.users.index') }}">User Management</flux:navlist.item>
                    <flux:navlist.item icon="document" href="{{ route('admin.pages.index') }}">Pages</flux:navlist.item>
                    <flux:navlist.group heading="Blog" expandable :expanded="false">
                        <flux:navlist.item icon="document-text" href="{{ route('admin.blog.posts') }}">View Posts</flux:navlist.item>
                        <flux:navlist.item icon="document-plus" href="{{ route('admin.blog.create') }}">Create Posts</flux:navlist.item>
                        <flux:navlist.item icon="tag" href="{{ route('admin.blog.categories') }}">Categories</flux:navlist.item>
                    </flux:navlist.group>
                    <flux:navlist.item icon="photo" href="{{ route('admin.gallery.index') }}">Gallery</flux:navlist.item>
                </flux:navlist>
        
                <flux:spacer />
        
                <flux:navlist variant="outline">
                    <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
                    <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
                </flux:navlist>
        
                <flux:dropdown position="top" align="start" class="max-lg:hidden">
                    <flux:profile avatar="https://fluxui.dev/img/demo/user.png" name="Olivia Martin" />
        
                    <flux:menu>
                        <flux:menu.radio.group>
                            <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                            <flux:menu.radio>Truly Delta</flux:menu.radio>
                        </flux:menu.radio.group>
        
                        <flux:menu.separator />
        
                        <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
            </flux:sidebar>
    
            <!-- Header -->
            <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
                <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
        
        
                <flux:navbar class="-mb-px max-lg:hidden">
                    <flux:navbar.item icon="home" href="#" current>Home</flux:navbar.item>
                    <flux:navbar.item icon="inbox" badge="12" href="#">Inbox</flux:navbar.item>
                    <flux:navbar.item icon="document-text" href="#">Documents</flux:navbar.item>
                    <flux:navbar.item icon="calendar" href="#">Calendar</flux:navbar.item>
        
                    <flux:separator vertical variant="subtle" class="my-2"/>
        
                    <flux:dropdown class="max-lg:hidden">
                        <flux:navbar.item icon-trailing="chevron-down">Favorites</flux:navbar.item>
        
                        <flux:navmenu>
                            <flux:navmenu.item href="#">Marketing site</flux:navmenu.item>
                            <flux:navmenu.item href="#">Android app</flux:navmenu.item>
                            <flux:navmenu.item href="#">Brand guidelines</flux:navmenu.item>
                        </flux:navmenu>
                    </flux:dropdown>
                </flux:navbar>
        
                <flux:spacer />
        
                <flux:navbar class="mr-4">
                    <flux:navbar.item icon="magnifying-glass" href="#" label="Search" />
                    <flux:navbar.item class="max-lg:hidden" icon="cog-6-tooth" href="#" label="Settings" />
                    <flux:navbar.item class="max-lg:hidden" icon="information-circle" href="#" label="Help" />
                    <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" icon="moon" variant="subtle" aria-label="Toggle dark mode" />
                </flux:navbar>
        
                <flux:dropdown position="top" align="start">
                    <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />
        
                    <flux:menu>
                        <flux:menu.radio.group>
                            <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                            <flux:menu.radio>Truly Delta</flux:menu.radio>
                        </flux:menu.radio.group>
        
                        <flux:menu.separator />
        
                        <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
                    </flux:menu>
                </flux:dropdown>
            </flux:header>
                        

        <!-- Your main content goes here -->

           {{-- <main>

                {{ $slot }} 

                </main> --}}

            <flux:main>

                {{ $slot }}                        
                
            </flux:main>
    
    @livewireScripts
    @fluxScripts
    </body>

</html>




