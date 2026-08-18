            <!-- Header -->
            <header class="h-16 border-b border-slate-700 bg-slate-900/50 backdrop-blur-sm flex items-center justify-between px-6 relative z-50">
                <div class="flex items-center gap-4">
                    <div>
                        <h1 class="font-semibold text-lg text-slate-100">Dashboard</h1>
                        <p class="text-sm text-slate-400">Welcome back to the admin panel</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <!-- Notifications Dropdown -->
                    {{-- <livewire:admin.notifications-dropdown /> --}}


                    <!-- User Menu Dropdown -->
                    <div>
                        <flux:dropdown position="bottom" align="end">
                            <flux:button variant="ghost" class="flex items-center gap-2 rounded-lg p-2 hover:bg-amber-400/10 cursor-pointer">
                                <div class="h-8 w-8 rounded-full overflow-hidden bg-amber-400/20 border border-amber-400/30 flex items-center justify-center">
                                    @if(auth()->user()?->avatar)
                                        <img
                                            src="{{ Storage::url(auth()->user()->avatar) }}"
                                            alt="{{ auth()->user()->name }}"
                                            class="h-full w-full object-cover"
                                        >
                                    @else
                                        <span class="text-xs font-semibold text-amber-400">
                                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                        </span>
                                    @endif
                                </div>

                                <div class="text-sm text-left cursor-pointer">
                                    <p class="font-medium text-slate-100">{{ auth()->user()->name ?? 'Admin' }}</p>
                                    <p class="text-slate-400 text-xs">System</p>
                                </div>
                            </flux:button>

                            <flux:menu class="w-56 bg-slate-900 border border-slate-700">
                                <div class="px-3 py-2 border-b border-slate-700">
                                    <p class="text-sm font-semibold text-slate-100">Admin Account</p>
                                </div>

                                {{-- <flux:menu.item
                                    :href="route('profile.index')"
                                    icon="user"
                                    class="text-slate-300 hover:bg-amber-400/10 hover:text-amber-400"
                                >
                                    Profile
                                </flux:menu.item> --}}

                                <div class="border-t border-slate-700 my-1"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <flux:menu.item
                                        as="button"
                                        type="submit"
                                        icon="arrow-right-start-on-rectangle"
                                        class="w-full text-red-400 hover:bg-red-400/10 cursor-pointer"
                                    >
                                        Sign Out
                                    </flux:menu.item>
                                </form>
                            </flux:menu>
                        </flux:dropdown>
                    </div>
                </div>
            </header>