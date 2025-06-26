    <!-- Profile Section -->
    <div class="pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex gap-8">
                <!-- Vertical Navigation -->
                <div class="w-64 flex-shrink-0">
                    <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden">
                        <div class="p-4 border-b border-gray-700">
                            <div class="flex items-center gap-3">
                                <div class="h-12 w-12 rounded-full bg-gray-700 overflow-hidden flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="font-semibold">John Doe</h2>
                                    <p class="text-sm text-gray-400">{{ '@' . $user->name }}</p>
                                </div>
                            </div>
                        </div>
                        <nav class="p-2">
                            <button type="button" wire:click="setTab('profile')" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700/50 rounded-lg transition-colors w-full text-left">
                                <i class="fas fa-user w-5"></i>
                                <span>Profile</span>
                            </button>
                            <button type="button" wire:click="setTab('security')" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700/50 rounded-lg transition-colors w-full text-left">
                                <i class="fas fa-shield-alt w-5"></i>
                                <span>Security</span>
                            </button>
                            <button type="button" wire:click="setTab('notifications')" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700/50 rounded-lg transition-colors w-full text-left">
                                <i class="fas fa-bell w-5"></i>
                                <span>Notifications</span>
                            </button>
                            <button type="button" wire:click="setTab('connections')" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700/50 rounded-lg transition-colors w-full text-left">
                                <i class="fas fa-link w-5"></i>
                                <span>Connections</span>
                            </button>
                            <div class="border-t border-gray-700 my-2"></div>
                            <button type="button" wire:click="setTab('help')" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700/50 rounded-lg transition-colors w-full text-left">
                                <i class="fas fa-question-circle w-5"></i>
                                <span>Help & Support</span>
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="flex-1">
                    <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden">
                        <!-- Profile Header -->
                        <div class="relative h-48 bg-gradient-to-r from-purple-600 to-purple-800">
                            <div class="absolute inset-0">
                                <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Cover Image" class="w-full h-full object-cover opacity-50">
                            </div>
                            <div class="absolute -bottom-16 left-8">
                                <div class="h-32 w-32 rounded-full border-4 border-gray-800 bg-gray-700 overflow-hidden flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-full h-full text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Content -->
                        <div class="pt-20 pb-8 px-8">
                            <div class="flex justify-between items-start mb-8">
                                <div>
                                    <h1 class="text-2xl font-bold">John Doe</h1>
                                    <p class="text-gray-400">{{ '@' . $user->name }}</p>
                                </div>
                            </div>

                            <!-- Profile Section -->
                            <div id="profile" class="section {{ $activeTab === 'profile' ? 'block' : 'hidden' }}">
                                <form>
                                    <!-- Personal Information -->
                                    <div class="bg-gray-700/50 rounded-lg p-6">
                                        <h2 class="text-xl font-semibold mb-4">Personal Information</h2>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-400 mb-2">First Name</label>
                                                <input type="text" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500" value="{{ $user->firstName }}">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-400 mb-2">Last Name</label>
                                                <input type="text" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500" value="{{ $user->lastName }}">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-400 mb-2">Email</label>
                                                <div class="relative">
                                                    <input type="email" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500" value="{{ $user->email }}" readonly>
                                                    <div class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center gap-2">
                                                    @if ($user->email_verified_at)
                                                        <span class="text-green-500 text-sm flex items-center gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            Verified
                                                        </span>
                                                    @else
                                                        <span class="text-yellow-500 text-sm flex items-center gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                            </svg>
                                                            Not Verified
                                                        </span>
                                                        <a href="{{ route('verify-email') }}" class="text-purple-400 hover:text-purple-300 text-sm">
                                                            Resend
                                                        </a>
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-400 mb-2">Phone</label>
                                                <input type="tel" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500" value="{{ $user->phone}}">
                                            </div>

                                        <div class="space-y-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-400 mb-2">Username</label>
                                                <input type="text" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="space-y-4">
                                            {{-- <div>
                                                <label class="block text-sm font-medium text-gray-400 mb-2">Username</label>
                                                <input type="text" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500" value="{{ $user->name }}">
                                            </div> --}}
                                        </div>
                                        <div class="space-y-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-400 mb-2">Current Password</label>
                                                <input type="password" placeholder="Current Password" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-400 mb-2">New Password</label>
                                                <input type="password" placeholder="New Password" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500">
                                            </div>
                                        </div>
                                    </div>   
                                    
                                    <!-- Save Button -->
                                    <div class="flex justify-end mt-8">
                                        <button type="submit" class="px-6 py-2 bg-[#9146FF] hover:bg-[#7c3dff] text-white font-medium rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg">
                                            Save Changes
                                        </button>
                                    </div>  
                                </form>
                            </div>

                            <!-- Security Section -->
                            <div id="security" class="section {{ $activeTab === 'security' ? 'block' : 'hidden' }}">
                                <div class="bg-gray-700/50 rounded-lg p-6">
                                    <h2 class="text-xl font-semibold mb-4">Security Settings</h2>
                                    <p class="text-sm text-gray-400 mb-4">Manage your account security and Sessions.</p>
                                    
                                    <!-- Passkey Authentication -->
                                    <livewire:passkeys />
                                                                        
                                    <!-- Session Management -->
                                    <div class="space-y-4">
                                        <h3 class="text-sm font-medium text-gray-300">Active Sessions - Just Placeholder for now</h3>
                                        <div class="bg-[rgba(17,17,17,0.7)] border border-white/10 rounded-lg p-4">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm text-gray-300">Windows PC - Chrome</p>
                                                    <p class="text-xs text-gray-400">Last active: 2 minutes ago</p>
                                                </div>
                                                <button type="button" class="text-sm text-red-500 hover:text-red-400 cursor-pointer">End Session</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>



                            </div>

                            <!-- Notifications Section -->
                            <div id="notifications" class="section {{ $activeTab === 'notifications' ? 'block' : 'hidden' }}">
                                <div class="bg-gray-700/50 rounded-lg p-6">
                                    <h2 class="text-xl font-semibold mb-4">Notification Preferences</h2>
                                    <p class="text-sm text-gray-400 mb-4">Choose how you want to be notified about stream updates and community activities.</p>
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h3 class="text-sm font-medium text-gray-300">Stream Notifications</h3>
                                                <p class="text-sm text-gray-400">Get notified when your favorite streamers go live</p>
                                            </div>
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h3 class="text-sm font-medium text-gray-300">Community Updates</h3>
                                                <p class="text-sm text-gray-400">Stay informed about community events and announcements</p>
                                            </div>
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer">
                                                <div class="w-11 h-6 bg-gray-600 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Connections Section -->
                            <div id="connections" class="section {{ $activeTab === 'connections' ? 'block' : 'hidden' }}">
                                <div class="bg-gray-700/50 rounded-lg p-6">
                                    <h2 class="text-xl font-semibold mb-4">Connected Accounts</h2>
                                    <div class="space-y-4">
                                        <!-- Google Connection -->
                                        <div class="flex items-center justify-between p-4 border border-gray-600 rounded-lg">
                                            <div class="flex items-center gap-3">
                                                <i class="fab fa-google text-red-500 text-xl"></i>
                                                <div>
                                                    <h3 class="font-medium text-white">Google</h3>
                                                    <p class="text-sm text-gray-400">Connect your Google account</p>
                                                </div>
                                            </div>
                                            <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                                                Connect
                                            </button>
                                        </div>

                                        <!-- GitHub Connection -->
                                        <div class="flex items-center justify-between p-4 border border-gray-600 rounded-lg">
                                            <div class="flex items-center gap-3">
                                                <i class="fab fa-github text-gray-300 text-xl"></i>
                                                <div>
                                                    <h3 class="font-medium text-white">GitHub</h3>
                                                    <p class="text-sm text-gray-400">Connect your GitHub account</p>
                                                </div>
                                            </div>
                                            <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                                                Connect
                                            </button>
                                        </div>

                                        <!-- Twitter Connection -->
                                        <div class="flex items-center justify-between p-4 border border-gray-600 rounded-lg">
                                            <div class="flex items-center gap-3">
                                                <i class="fab fa-twitter text-blue-400 text-xl"></i>
                                                <div>
                                                    <h3 class="font-medium text-white">Twitter</h3>
                                                    <p class="text-sm text-gray-400">Connect your Twitter account</p>
                                                </div>
                                            </div>
                                            <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                                                Connect
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>