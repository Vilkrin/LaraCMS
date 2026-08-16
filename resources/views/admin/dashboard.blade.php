<x-layouts::admin :title="__('Dashboard')">

                <!-- Main Content -->
            <main class="flex-1 p-6 overflow-auto relative z-0">
                <div class="space-y-8">
                    <!-- Analytics & Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-slate-900/50 border border-slate-700 rounded-lg backdrop-blur-sm shadow-sm">
                            <div class="flex flex-col space-y-1.5 p-6 pb-2">
                                <div class="flex flex-row items-center justify-between space-y-0">
                                    <h3 class="text-sm font-medium text-slate-400">Total Visitors</h3>
                                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">12,345</div>
                                <div class="flex items-center text-xs">
                                    <svg class="h-3 w-3 text-green-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l10-10M17 7v10"/>
                                    </svg>
                                    <span class="text-green-500">+12.5%</span>
                                    <span class="text-slate-400 ml-1">from last month</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-900/50 border border-slate-700 rounded-lg backdrop-blur-sm shadow-sm">
                            <div class="flex flex-col space-y-1.5 p-6 pb-2">
                                <div class="flex flex-row items-center justify-between space-y-0">
                                    <h3 class="text-sm font-medium text-slate-400">Page Views</h3>
                                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">45,678</div>
                                <div class="flex items-center text-xs">
                                    <svg class="h-3 w-3 text-green-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l10-10M17 7v10"/>
                                    </svg>
                                    <span class="text-green-500">+8.2%</span>
                                    <span class="text-slate-400 ml-1">from last month</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-900/50 border border-slate-700 rounded-lg backdrop-blur-sm shadow-sm">
                            <div class="flex flex-col space-y-1.5 p-6 pb-2">
                                <div class="flex flex-row items-center justify-between space-y-0">
                                    <h3 class="text-sm font-medium text-slate-400">Avg. Session</h3>
                                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">3m 42s</div>
                                <div class="flex items-center text-xs">
                                    <svg class="h-3 w-3 text-red-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17l-10-10M7 7v10"/>
                                    </svg>
                                    <span class="text-red-500">-2.1%</span>
                                    <span class="text-slate-400 ml-1">from last month</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-900/50 border border-slate-700 rounded-lg backdrop-blur-sm shadow-sm">
                            <div class="flex flex-col space-y-1.5 p-6 pb-2">
                                <div class="flex flex-row items-center justify-between space-y-0">
                                    <h3 class="text-sm font-medium text-slate-400">Bounce Rate</h3>
                                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">24.8%</div>
                                <div class="flex items-center text-xs">
                                    <svg class="h-3 w-3 text-green-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17l10-10M17 7v10"/>
                                    </svg>
                                    <span class="text-green-500">-5.3%</span>
                                    <span class="text-slate-400 ml-1">from last month</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Overview & Recent Activity -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                        <!-- Content Status Card -->
                        <div class="bg-slate-900/50 border border-slate-700 rounded-lg backdrop-blur-sm shadow-sm">
                            <div class="flex flex-col space-y-1.5 p-6 pb-3">
                                <h3 class="text-sm font-medium flex items-center gap-2 text-slate-100">
                                    <svg class="h-4 w-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Content Status
                                </h3>
                            </div>
                            <div class="p-6 pt-0 space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-sm text-slate-400">Published</span>
                                    <span class="text-sm font-medium text-slate-100">89</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-slate-400">Drafts</span>
                                    <span class="text-sm font-medium text-slate-100">23</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-slate-400">Scheduled</span>
                                    <span class="text-sm font-medium text-slate-100">15</span>
                                </div>
                            </div>
                        </div>

                        <!-- User Activity Card -->
                        <div class="bg-slate-900/50 border border-slate-700 rounded-lg backdrop-blur-sm shadow-sm">
                            <div class="flex flex-col space-y-1.5 p-6 pb-3">
                                <h3 class="text-sm font-medium flex items-center gap-2 text-slate-100">
                                    <svg class="h-4 w-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                    </svg>
                                    User Activity
                                </h3>
                            </div>
                            <div class="p-6 pt-0 space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-sm text-slate-400">Online Now</span>
                                    <span class="text-sm font-medium text-slate-100">34</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-slate-400">Today</span>
                                    <span class="text-sm font-medium text-slate-100">156</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-slate-400">This Week</span>
                                    <span class="text-sm font-medium text-slate-100">892</span>
                                </div>
                            </div>
                        </div>

                        <!-- Upcoming Events Card -->
                        <div class="bg-slate-900/50 border border-slate-700 rounded-lg backdrop-blur-sm shadow-sm">
                            <div class="flex flex-col space-y-1.5 p-6 pb-3">
                                <h3 class="text-sm font-medium text-slate-100">Upcoming Events</h3>
                            </div>
                            <div class="p-6 pt-0 space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-sm text-slate-400">Fleet Operations</span>
                                    <span class="text-sm font-medium text-slate-100">Today 20:00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-slate-400">Training Session</span>
                                    <span class="text-sm font-medium text-slate-100">Tomorrow</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm text-slate-400">Weekly Brief</span>
                                    <span class="text-sm font-medium text-slate-100">Friday</span>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity Card -->
                        <div class="bg-slate-900/50 border border-slate-700 rounded-lg backdrop-blur-sm shadow-sm">
                            <div class="flex flex-col space-y-1.5 p-6">
                                <h3 class="text-2xl font-semibold leading-none tracking-tight text-slate-100">Recent Activity</h3>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <span class="inline-flex items-center rounded-full border border-slate-700 bg-slate-800/50 px-2.5 py-0.5 text-xs font-semibold text-slate-300 transition-colors hover:bg-slate-800">/fleet</span>
                                            <span class="text-sm text-slate-400">1234 views</span>
                                        </div>
                                        <span class="text-xs text-slate-500">2 hours ago</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <span class="inline-flex items-center rounded-full border border-slate-700 bg-slate-800/50 px-2.5 py-0.5 text-xs font-semibold text-slate-300 transition-colors hover:bg-slate-800">/recruitment</span>
                                            <span class="text-sm text-slate-400">987 views</span>
                                        </div>
                                        <span class="text-xs text-slate-500">4 hours ago</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <span class="inline-flex items-center rounded-full border border-slate-700 bg-slate-800/50 px-2.5 py-0.5 text-xs font-semibold text-slate-300 transition-colors hover:bg-slate-800">/about</span>
                                            <span class="text-sm text-slate-400">654 views</span>
                                        </div>
                                        <span class="text-xs text-slate-500">6 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Activity Log --}}
                    {{-- @can('view.activity.logs')
                        <livewire:admin.dashboard.activity-log />
                    @endcan --}}
                </div>
            </main>
        

</x-layouts::admin>