<div>
    <div class="p-6 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <!-- Page Header -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Gallery Management</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage your albums and photo uploads.</p>
            </div>
            <div class="space-x-2">
                <button wire:click="$set('showAlbumModal', true)" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm">
                    + New Album
                </button>
                <a href="{{ route('admin.gallery.photos.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 text-sm">
                    Upload Images
                </a>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mb-4 border-b border-gray-300 dark:border-gray-700">
            <nav class="flex space-x-6 text-sm font-medium text-gray-600 dark:text-gray-300">
                <button wire:click="toggleTab('albums')" 
                        class="pb-2 {{ $activeTab === 'albums' ? 'border-b-2 border-blue-600 text-blue-600 dark:text-blue-400' : 'hover:text-blue-600 dark:hover:text-blue-400' }}">
                    Albums
                </button>
                <button wire:click="toggleTab('unassigned')" 
                        class="pb-2 {{ $activeTab === 'unassigned' ? 'border-b-2 border-blue-600 text-blue-600 dark:text-blue-400' : 'hover:text-blue-600 dark:hover:text-blue-400' }}">
                    Unassigned Photos
                </button>
            </nav>
        </div>

        <!-- Album Grid -->
        <div class="{{ $activeTab === 'albums' ? 'block' : 'hidden' }}">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($albums as $album)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition p-4">
                        @if($album->hasMedia('album_cover'))
                            <img src="{{ $album->getFirstMediaUrl('album_cover', 'preview') }}" 
                                 alt="{{ $album->album_name }}" 
                                 class="rounded-md mb-3 w-full h-40 object-cover">
                        @else
                            <img src="https://placehold.co/300x200?text=Album+Cover" 
                                 alt="Album Cover" 
                                 class="rounded-md mb-3 w-full h-40 object-cover">
                        @endif
                        <div>
                            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 truncate">{{ $album->album_name }}</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $album->photos_count ?? 0 }} Photos</p>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('admin.gallery.show', $album->slug) }}" 
                               class="text-sm text-blue-600 hover:underline dark:text-blue-400">View</a>
                            <div class="space-x-2">
                                <a href="{{ route('admin.gallery.edit', $album->slug) }}" 
                                   class="text-sm text-gray-600 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400">Edit</a>
                                <button wire:click="confirmDelete({{ $album->id }})" 
                                        class="text-sm text-red-600 hover:underline">Delete</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center p-6 bg-gray-50 dark:bg-gray-800 rounded-lg shadow">
                        <p class="text-gray-500 dark:text-gray-400">No albums available.</p>
                    </div>
                @endforelse
            </div>
            <div class="mt-6">
                {{ $albums->links() }}
            </div>
        </div>

        <!-- Unassigned Photos Grid -->
        <div class="{{ $activeTab === 'unassigned' ? 'block' : 'hidden' }}">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($photos as $photo)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition p-4">
                        @if($photo->hasMedia('images'))
                            <img src="{{ $photo->getFirstMediaUrl('images','thumb'); }}" 
                                 alt="Photo" 
                                 class="rounded-md mb-3 w-full h-40 object-cover">
                        @else
                            <img src="https://placehold.co/300x200?text=No+Image" 
                                 alt="No Image" 
                                 class="rounded-md mb-3 w-full h-40 object-cover">
                        @endif
                        <div>
                            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 truncate">
                                {{ $photo->getFirstMedia('images')->file_name ?? 'Untitled' }}
                            </h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Uploaded {{ $photo->created_at->format('M d, Y') }}
                            </p>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="{{ route('image.show', $photo) }}" 
                               class="text-sm text-blue-600 hover:underline dark:text-blue-400">View</a>
                            <div class="space-x-2">
                                <a href="{{ route('admin.gallery.photos.edit', $photo) }}" 
                                   class="text-sm text-gray-600 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400">Edit</a>
                                <button wire:click="deletePhoto({{ $photo->id }})" 
                                        class="text-sm text-red-600 hover:underline"
                                        onclick="return confirm('Are you sure you want to delete this photo?')">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center p-6 bg-gray-50 dark:bg-gray-800 rounded-lg shadow">
                        <p class="text-gray-500 dark:text-gray-400">No unassigned photos available.</p>
                    </div>
                @endforelse
            </div>
            <div class="mt-6">
                {{ $photos->links() }}
            </div>
        </div>
    </div>

    <!-- Create Album Modal -->
    <div x-data="{ show: @entangle('showAlbumModal') }" 
         x-show="show" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto" 
         aria-labelledby="modal-title" 
         role="dialog" 
         aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="show" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
                 aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="show" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form wire:submit.prevent="createAlbum">
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <label for="album_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Album Name</label>
                            <input type="text" 
                                   wire:model="album_name" 
                                   id="album_name" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                            @error('album_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <textarea wire:model="description" 
                                      id="description" 
                                      rows="3" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm"></textarea>
                            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                            <input type="text" 
                                   wire:model="category" 
                                   id="category" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                            @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="album_cover" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Album Cover</label>
                            <input type="file" 
                                   wire:model="album_cover" 
                                   id="album_cover" 
                                   accept="image/*" 
                                   class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-md file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-blue-50 file:text-blue-700
                                          hover:file:bg-blue-100
                                          dark:file:bg-gray-700 dark:file:text-gray-300">
                            @error('album_cover') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" 
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Create Album
                        </button>
                        <button type="button" 
                                wire:click="$set('showAlbumModal', false)" 
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-data="{ show: @entangle('showDeleteModal') }" 
         x-show="show" 
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto" 
         aria-labelledby="modal-title" 
         role="dialog" 
         aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="show" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
                 aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="show" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                                Delete Album
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Are you sure you want to delete this album? This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click="deleteAlbum" 
                            type="button" 
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Delete
                    </button>
                    <button wire:click="$set('showDeleteModal', false)" 
                            type="button" 
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div> 