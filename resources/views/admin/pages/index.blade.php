<x-layouts::admin :title="__('Page Management')">

                  <div class="space-y-6">
                    <!-- Stats Cards -->
                    <div class="grid gap-4 md:grid-cols-4">
                        <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                            <div class="flex flex-row items-center justify-between space-y-0 p-6 pb-2">
                                <h3 class="text-sm font-medium text-slate-400">Total Pages</h3>
                                <svg class="h-4 w-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">5</div>
                            </div>
                        </div>
                        
                        <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                            <div class="flex flex-row items-center justify-between space-y-0 p-6 pb-2">
                                <h3 class="text-sm font-medium text-slate-400">Published</h3>
                                <svg class="h-4 w-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">3</div>
                            </div>
                        </div>
                        
                        <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                            <div class="flex flex-row items-center justify-between space-y-0 p-6 pb-2">
                                <h3 class="text-sm font-medium text-slate-400">Drafts</h3>
                                <svg class="h-4 w-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">1</div>
                            </div>
                        </div>
                        
                        <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                            <div class="flex flex-row items-center justify-between space-y-0 p-6 pb-2">
                                <h3 class="text-sm font-medium text-slate-400">Total Views</h3>
                                <svg class="h-4 w-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="text-2xl font-bold text-slate-100">25,847</div>
                            </div>
                        </div>
                    </div>

                    <!-- Pages Table -->
                    <div class="bg-slate-900/50 border border-amber-400/20 backdrop-blur-sm rounded-lg shadow-sm">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                            <div>
                                    <h3 class="text-2xl font-semibold text-slate-100">All Pages</h3>
                                    <p class="text-sm text-slate-400 mt-1">Manage and organize your website pages</p>
                                </div>
                                <a href="{{ route('admin.pages.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-amber-400 text-slate-900 rounded-md font-medium hover:bg-amber-300 transition-colors">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Add Page
                                </a>
                            </div>
                            
                            <div class="flex items-center space-x-2 mb-4">
                                <div class="relative flex-1 max-w-sm">
                                    <svg class="absolute left-2 top-2.5 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    <input 
                                        type="text"
                                        placeholder="Search pages..."
                                        class="flex h-10 w-full rounded-md border border-slate-700 bg-slate-900/50 px-3 py-2 text-sm pl-8 placeholder:text-slate-400 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-amber-400"
                                    />
                                </div>
                                <select class="flex h-10 w-32 rounded-md border border-slate-700 bg-slate-900/50 px-3 py-2 text-sm focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-amber-400">
                                    <option value="all">All Status</option>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                    <option value="archived">Archived</option>
                                </select>
                            </div>
                            
                            <div class="relative w-full overflow-auto">
                                <table class="w-full caption-bottom text-sm">
                                    <thead class="[&_tr]:border-b">
                                        <tr class="border-b border-slate-700 transition-colors hover:bg-slate-800/50">
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Title</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">URL</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Status</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Template</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Author</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Views</th>
                                            <th class="h-12 px-4 text-left align-middle font-medium text-slate-400">Updated</th>
                                            <th class="h-12 px-4 text-right align-middle font-medium text-slate-400">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="[&_tr:last-child]:border-0">
                                        <tr class="border-b border-slate-700 transition-colors hover:bg-slate-800/50">
                                            <td class="p-4 align-middle font-medium text-slate-100">Home</td>
                                            <td class="p-4 align-middle text-slate-400">/</td>
                                            <td class="p-4 align-middle">
                                                <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold bg-green-500/10 text-green-400 border-green-500/20">published</span>
                                            </td>
                                            <td class="p-4 align-middle capitalize text-slate-100">default</td>
                                            <td class="p-4 align-middle text-slate-100">Admin</td>
                                            <td class="p-4 align-middle text-slate-100">12,456</td>
                                            <td class="p-4 align-middle text-slate-100">2024-01-15</td>
                                            <td class="p-4 align-middle text-right">
                                                <div class="flex items-center justify-end space-x-2">
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>
                                                    </button>
                                                    <a href="edit-page.html" class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                    </a>
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-red-400/10 hover:text-red-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="border-b border-slate-700 transition-colors hover:bg-slate-800/50">
                                            <td class="p-4 align-middle font-medium text-slate-100">About</td>
                                            <td class="p-4 align-middle text-slate-400">/about</td>
                                            <td class="p-4 align-middle">
                                                <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold bg-green-500/10 text-green-400 border-green-500/20">published</span>
                                            </td>
                                            <td class="p-4 align-middle capitalize text-slate-100">default</td>
                                            <td class="p-4 align-middle text-slate-100">Content Team</td>
                                            <td class="p-4 align-middle text-slate-100">8,234</td>
                                            <td class="p-4 align-middle text-slate-100">2024-01-14</td>
                                            <td class="p-4 align-middle text-right">
                                                <div class="flex items-center justify-end space-x-2">
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>
                                                    </button>
                                                    <a href="edit-page.html" class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                    </a>
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-red-400/10 hover:text-red-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="border-b border-slate-700 transition-colors hover:bg-slate-800/50">
                                            <td class="p-4 align-middle font-medium text-slate-100">Fleet</td>
                                            <td class="p-4 align-middle text-slate-400">/fleet</td>
                                            <td class="p-4 align-middle">
                                                <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold bg-yellow-500/10 text-yellow-400 border-yellow-500/20">draft</span>
                                            </td>
                                            <td class="p-4 align-middle capitalize text-slate-100">fleet</td>
                                            <td class="p-4 align-middle text-slate-100">Fleet Manager</td>
                                            <td class="p-4 align-middle text-slate-100">5,123</td>
                                            <td class="p-4 align-middle text-slate-100">2024-01-13</td>
                                            <td class="p-4 align-middle text-right">
                                                <div class="flex items-center justify-end space-x-2">
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>
                                                    </button>
                                                    <a href="edit-page.html" class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                    </a>
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-red-400/10 hover:text-red-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="border-b border-slate-700 transition-colors hover:bg-slate-800/50">
                                            <td class="p-4 align-middle font-medium text-slate-100">Recruitment</td>
                                            <td class="p-4 align-middle text-slate-400">/recruitment</td>
                                            <td class="p-4 align-middle">
                                                <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold bg-green-500/10 text-green-400 border-green-500/20">published</span>
                                            </td>
                                            <td class="p-4 align-middle capitalize text-slate-100">recruitment</td>
                                            <td class="p-4 align-middle text-slate-100">HR Team</td>
                                            <td class="p-4 align-middle text-slate-100">3,456</td>
                                            <td class="p-4 align-middle text-slate-100">2024-01-12</td>
                                            <td class="p-4 align-middle text-right">
                                                <div class="flex items-center justify-end space-x-2">
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>
                                                    </button>
                                                    <a href="edit-page.html" class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                    </a>
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-red-400/10 hover:text-red-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="border-b border-slate-700 transition-colors hover:bg-slate-800/50">
                                            <td class="p-4 align-middle font-medium text-slate-100">Contact</td>
                                            <td class="p-4 align-middle text-slate-400">/contact</td>
                                            <td class="p-4 align-middle">
                                                <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold bg-green-500/10 text-green-400 border-green-500/20">published</span>
                                            </td>
                                            <td class="p-4 align-middle capitalize text-slate-100">contact</td>
                                            <td class="p-4 align-middle text-slate-100">Support</td>
                                            <td class="p-4 align-middle text-slate-100">6,789</td>
                                            <td class="p-4 align-middle text-slate-100">2024-01-11</td>
                                            <td class="p-4 align-middle text-right">
                                                <div class="flex items-center justify-end space-x-2">
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>
                                                    </button>
                                                    <a href="edit-page.html" class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                    </a>
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-red-400/10 hover:text-red-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="transition-colors hover:bg-slate-800/50">
                                            <td class="p-4 align-middle font-medium text-slate-100">Privacy Policy</td>
                                            <td class="p-4 align-middle text-slate-400">/privacy</td>
                                            <td class="p-4 align-middle">
                                                <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold bg-slate-500/10 text-slate-400 border-slate-500/20">archived</span>
                                            </td>
                                            <td class="p-4 align-middle capitalize text-slate-100">legal</td>
                                            <td class="p-4 align-middle text-slate-100">Legal Team</td>
                                            <td class="p-4 align-middle text-slate-100">2,891</td>
                                            <td class="p-4 align-middle text-slate-100">2024-01-10</td>
                                            <td class="p-4 align-middle text-right">
                                                <div class="flex items-center justify-end space-x-2">
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>
                                                    </button>
                                                    <a href="edit-page.html" class="inline-flex items-center justify-center h-9 w-9 hover:bg-amber-400/10 hover:text-amber-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                    </a>
                                                    <button class="inline-flex items-center justify-center h-9 w-9 hover:bg-red-400/10 hover:text-red-400 rounded transition-colors">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Dropdown functionality
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationMenu = document.getElementById('notificationMenu');
        const userMenuBtn = document.getElementById('userMenuBtn');
        const userMenu = document.getElementById('userMenu');

        notificationBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            notificationMenu.classList.toggle('hidden');
            userMenu.classList.add('hidden');
        });

        userMenuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            userMenu.classList.toggle('hidden');
            notificationMenu.classList.add('hidden');
        });

        document.addEventListener('click', () => {
            notificationMenu.classList.add('hidden');
            userMenu.classList.add('hidden');
        });

        // Sidebar toggle functionality
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.querySelector('aside');
        
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', () => {
                if (sidebar.classList.contains('w-64')) {
                    sidebar.classList.remove('w-64');
                    sidebar.classList.add('w-14');
                    sidebar.querySelectorAll('h2, h3, p, span').forEach(el => {
                        if (!el.closest('svg')) {
                            el.style.display = 'none';
                        }
                    });
                } else {
                    sidebar.classList.remove('w-14');
                    sidebar.classList.add('w-64');
                    sidebar.querySelectorAll('h2, h3, p, span').forEach(el => {
                        el.style.display = '';
                    });
                }
            });
        }
    </script>

</x-layouts::admin>