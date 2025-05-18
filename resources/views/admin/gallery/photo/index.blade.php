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
      <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 text-sm">
        Upload Images
      </button>
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
    <!-- Add more album cards here -->
  </div>

  <!-- Unassigned Photos Grid -->
<div id="unassigned-section" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
  <!-- Unassigned Photo Card -->
  @forelse ( as )   

  <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition p-4">
    <img src="https://placehold.co/300x200?text=Unassigned+Photo" alt="Unassigned" class="rounded-md mb-3 w-full h-40 object-cover">
    <div>
      <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 truncate">DSC_0012.jpg</h2>
      <p class="text-sm text-gray-500 dark:text-gray-400">Uploaded May 10, 2025</p>
    </div>
    <div class="mt-4 flex justify-between items-center">
      <button class="text-sm text-blue-600 hover:underline dark:text-blue-400">View</button>
      <div class="space-x-2">
        <button class="text-sm text-gray-600 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400">Edit</button>
        <button class="text-sm text-red-600 hover:underline">Delete</button>
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
</div>

</x-adminlayout>