<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    <h1>This is the Home Page.</h1>
    @if (Route::has('login'))
    @auth
        
    <p>hello {{ Auth::user()->name; }}</p>
    <p>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

    </p>
    @else

    @endauth
    
    @endif
</x-layout>