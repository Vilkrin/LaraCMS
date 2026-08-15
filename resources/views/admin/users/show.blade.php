<x-layouts.admin :title="__('Show User')">

                <div class="flex items-center gap-4 space-y-6">
                    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 px-3 py-2 text-sm text-slate-300 hover:bg-slate-800/50 rounded transition-colors">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Back to Users
                    </a>
                    <div class="h-6 w-px bg-slate-700"></div>
                    <div>
                        <h1 class="font-semibold text-lg text-slate-100">User Details</h1>
                        <p class="text-sm text-slate-400">View user information</p>
                    </div>

                    
                    
                </div>

                  <div class="space-y-6">
                    <!-- User Profile Card -->
                    <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                        <div class="p-6">
                            <div class="flex items-start justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-16 rounded-full bg-amber-400 text-slate-900 flex items-center justify-center text-xl font-bold">
                                        AC
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-bold text-slate-100">{{ $user->name }}</h2>
                                        <p class="text-slate-400">{{ $user->email }}</p>
                                        <div class="flex items-center gap-2 mt-2">
                                            <span class="inline-flex items-center rounded-md border px-2.5 py-0.5 text-xs font-semibold border-red-400/50 bg-red-400/10 text-red-400">
                                                {{ $user->getRoleNames()->implode(', ') }}
                                            </span>
                                            <div class="flex items-center gap-1">
                                                <flux:icon.user-check class="text-green-500 dark:text-green-300" />
                                                <span class="text-green-600 text-sm">{{ $user->status }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                                <flux:button variant="primary" color="amber" icon="pencil-square" href="{{ route('admin.users.edit', $user->id) }}">Edit User</flux:button>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Contact Information -->
                        <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                            <div class="p-6 border-b border-slate-700">
                                <h3 class="text-2xl font-semibold leading-none tracking-tight flex items-center gap-2 text-slate-100">
                                    <svg class="h-5 w-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Contact Information
                                </h3>
                            </div>
                            <div class="p-6 space-y-4">
                                <div>
                                    <label class="text-sm font-medium text-slate-400">Email</label>
                                    <p class="text-sm text-slate-100 mt-1">alex.chen@imperialarms.com</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-slate-400">Phone</label>
                                    <p class="text-sm text-slate-100 mt-1">+1 (555) 123-4567</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-slate-400">Department</label>
                                    <p class="text-sm text-slate-100 mt-1">Engineering</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-slate-400">Location</label>
                                    <p class="text-sm text-slate-100 mt-1">San Francisco, CA</p>
                                </div>
                            </div>
                        </div>

                        <!-- Account Information -->
                        <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                            <div class="p-6 border-b border-slate-700">
                                <h3 class="text-2xl font-semibold leading-none tracking-tight flex items-center gap-2 text-slate-100">
                                    <svg class="h-5 w-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Account Information
                                </h3>
                            </div>
                            <div class="p-6 space-y-4">
                                <div>
                                    <label class="text-sm font-medium text-slate-400">Join Date</label>
                                    <p class="text-sm text-slate-100 mt-1">2023-06-15</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-slate-400">Last Login</label>
                                    <p class="text-sm text-slate-100 mt-1">2024-01-15</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-slate-400">User ID</label>
                                    <p class="text-sm text-slate-100 mt-1">#1</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-slate-400">Status</label>
                                    <div class="flex items-center gap-2 mt-1">
                                        <flux:icon.user-check class="text-green-500 dark:text-green-300" /> 
                                        <span class="text-green-600 text-sm">Active</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Dossier -->
                    <div class="bg-slate-900/50 border border-slate-700 backdrop-blur-sm rounded-lg shadow-sm">
                        <div class="p-6 border-b border-slate-700">
                            <div class="flex items-center justify-between">
                                <h3 class="text-2xl font-semibold leading-none tracking-tight flex items-center gap-2 text-slate-100">
                                    <flux:icon.document-text class="text-amber-500 dark:text-amber-300" />
                                    Dossier
                                </h3>
                            </div>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="text-sm font-medium text-slate-400">Rank</label>
                                    <p class="text-sm text-slate-100 mt-1">Captain</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-slate-400">Division</label>
                                    <p class="text-sm text-slate-100 mt-1">Engineering Corps</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-slate-400">Status</label>
                                    <p class="text-sm text-slate-100 mt-1">Active Duty</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-slate-400">Enlistment Date</label>
                                    <p class="text-sm text-slate-100 mt-1">2023-06-15</p>
                                </div>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-slate-400">Service Record</label>
                                <ul class="list-disc list-inside space-y-1 mt-2 text-sm text-slate-100">
                                    <li>Completed Advanced Systems Training - 2023-08-20</li>
                                    <li>Promoted to Captain - 2024-01-10</li>
                                    <li>Led successful fleet optimization project - 2024-03-15</li>
                                </ul>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-slate-400">Commendations</label>
                                <ul class="list-disc list-inside space-y-1 mt-2 text-sm text-slate-100">
                                    <li>Excellence in Technical Leadership Award</li>
                                    <li>Outstanding Service Medal</li>
                                </ul>
                            </div>

                            <div>
                                <label class="text-sm font-medium text-slate-400">Leadership Notes</label>
                                <p class="text-sm text-slate-100 mt-2 whitespace-pre-wrap">Exceptional technical skills and leadership qualities. Shows great promise for advanced command positions. Consistently exceeds performance expectations.</p>
                            </div>
                        </div>
                    </div>
                </div>

</x-layouts.admin>