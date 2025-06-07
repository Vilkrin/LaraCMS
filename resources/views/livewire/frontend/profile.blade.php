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
                                    <h2 class="font-semibold">{{ $user->firstName . ' ' . $user->lastName }}</h2>
                                    <p class="text-sm text-gray-400">{{ '@' . $user->name }}</p>
                                </div>
                            </div>
                        </div>
                        <nav class="p-2">
                            <a href="#profile" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700/50 rounded-lg transition-colors">
                                <i class="fas fa-user w-5"></i>
                                <span>Profile</span>
                            </a>
                            <a href="#security" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700/50 rounded-lg transition-colors">
                                <i class="fas fa-shield-alt w-5"></i>
                                <span>Security</span>
                            </a>
                            <a href="#notifications" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700/50 rounded-lg transition-colors">
                                <i class="fas fa-bell w-5"></i>
                                <span>Notifications</span>
                            </a>
                            <a href="#appearance" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700/50 rounded-lg transition-colors">
                                <i class="fas fa-paint-brush w-5"></i>
                                <span>Appearance</span>
                            </a>
                            <a href="#connections" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700/50 rounded-lg transition-colors">
                                <i class="fas fa-link w-5"></i>
                                <span>Connections</span>
                            </a>
                            <div class="border-t border-gray-700 my-2"></div>
                            <a href="#help" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-700/50 rounded-lg transition-colors">
                                <i class="fas fa-question-circle w-5"></i>
                                <span>Help & Support</span>
                            </a>
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
                                    <h1 class="text-2xl font-bold">{{ $user->firstName . ' ' . $user->lastName }}</h1>
                                    <p class="text-gray-400">{{ '@' . $user->name }}</p>
                                </div>
                                <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                    Edit Profile
                                </button>
                            </div>

                            <!-- Profile Settings Form -->
                            <form class="space-y-6">
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
                                                <input type="email" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500" value="{{ $user->email }}" disabled>
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
                                            <input type="tel" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500" value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Account Settings -->
                                <div class="bg-gray-700/50 rounded-lg p-6">
                                    <h2 class="text-xl font-semibold mb-4">Account Settings</h2>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400 mb-2">Username</label>
                                            <input type="text" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500" value="{{ $user->name }}" disabled>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400 mb-2">Change Password</label>
                                            <input type="password" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500" placeholder="Enter new password">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-400 mb-2">Confirm Password</label>
                                            <input type="password" class="w-full bg-gray-800 border border-gray-600 rounded-md px-4 py-2 text-white focus:outline-none focus:border-purple-500" placeholder="Confirm new password">
                                        </div>
                                    </div>
                                </div>

                                <!-- Notification Preferences -->
                                <div class="bg-gray-700/50 rounded-lg p-6">
                                    <h2 class="text-xl font-semibold mb-4">Notification Preferences</h2>
                                    <div class="space-y-4">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h3 class="font-medium">Email Notifications</h3>
                                                <p class="text-sm text-gray-400">Receive updates about new streams and content</p>
                                            </div>
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                                            </label>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h3 class="font-medium">Stream Notifications</h3>
                                                <p class="text-sm text-gray-400">Get notified when we go live</p>
                                            </div>
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Save Button -->
                                <div class="flex justify-end">
                                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-md text-sm font-medium transition-colors">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>