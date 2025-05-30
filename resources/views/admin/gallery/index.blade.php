<x-adminlayout>
<div class="p-6 bg-gray-100 dark:bg-gray-900 min-h-screen">
  <!-- Page Header -->
  <div class="mb-6 flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Gallery Management</h1>
      <p class="text-sm text-gray-500 dark:text-gray-400">Manage your albums and photo uploads.</p>
    </div>
    <div class="space-x-2">
      <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm">
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
      <button class="pb-2 border-b-2 border-blue-600 text-blue-600 dark:text-blue-400" onclick="toggleTab('albums')">
        Albums
      </button>
      <button class="pb-2 hover:text-blue-600 dark:hover:text-blue-400" onclick="toggleTab('unassigned')">
        Unassigned Photos
      </button>
    </nav>
  </div>

  <!-- Album Grid -->
  <div id="albums-section" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- Example Album Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition p-4">
      <img src="https://placehold.co/300x200?text=Album+Cover" alt="Album Cover" class="rounded-md mb-3 w-full h-40 object-cover">
      <div>
        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 truncate">Vacation 2023</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">12 Photos</p>
      </div>
      <div class="mt-4 flex justify-between items-center">
        <button class="text-sm text-blue-600 hover:underline dark:text-blue-400">View</button>
        <div class="space-x-2">
          <button class="text-sm text-gray-600 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400">Edit</button>
          <button class="text-sm text-red-600 hover:underline">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Unassigned Photos Grid -->
  <div id="unassigned-section" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($photos as $photo)
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition p-4">
        @if($photo->hasMedia('images'))
          <img src="{{ $photo->getFirstMediaUrl('images') }}" 
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
          <a href="{{ route('admin.gallery.photos.show', $photo) }}" 
             class="text-sm text-blue-600 hover:underline dark:text-blue-400">View</a>
          <div class="space-x-2">
            <a href="{{ route('admin.gallery.photos.edit', $photo) }}" 
               class="text-sm text-gray-600 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400">Edit</a>
            <form action="{{ route('admin.gallery.photos.destroy', $photo) }}" 
                  method="POST" 
                  class="inline">
              @csrf
              @method('DELETE')
              <button type="submit" 
                      class="text-sm text-red-600 hover:underline"
                      onclick="return confirm('Are you sure you want to delete this photo?')">
                Delete
              </button>
            </form>
          </div>
        </div>
      </div>
    @empty
      <div class="col-span-4 text-center p-6 bg-gray-50 dark:bg-gray-800 rounded-lg shadow">
        <p class="text-gray-500 dark:text-gray-400">No unassigned photos available.</p>
      </div>
    @endforelse
  </div>
</div>

<script>
function toggleTab(tabName) {
  const albumsSection = document.getElementById('albums-section');
  const unassignedSection = document.getElementById('unassigned-section');
  const tabs = document.querySelectorAll('nav button');

  if (tabName === 'albums') {
    albumsSection.style.display = 'grid';
    unassignedSection.style.display = 'none';
    tabs[0].classList.add('border-b-2', 'border-blue-600', 'text-blue-600');
    tabs[1].classList.remove('border-b-2', 'border-blue-600', 'text-blue-600');
  } else {
    albumsSection.style.display = 'none';
    unassignedSection.style.display = 'grid';
    tabs[0].classList.remove('border-b-2', 'border-blue-600', 'text-blue-600');
    tabs[1].classList.add('border-b-2', 'border-blue-600', 'text-blue-600');
  }
}

// Initialize with albums tab
document.addEventListener('DOMContentLoaded', function() {
  toggleTab('albums');
});
</script>
</x-adminlayout>