<div>
    <div class="p-6 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <!-- Page Header -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Photo Management</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage your Photo uploads.</p>
            </div>
            <div class="space-x-2">
                <flux:button variant="primary" color="green" href="{{ route('admin.gallery.photos.create') }}">Upload Images</flux:button>
            </div>
            
        </div>

                    <div>
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

</div>
