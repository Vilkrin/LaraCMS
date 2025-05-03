<x-adminlayout>

  <div class="p-6 bg-gray-100 dark:bg-gray-900 min-h-screen">
    <!-- Page Header -->
    <div class="mb-6 flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Gallery Management</h1>
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
      <nav class="flex space-x-6 text-sm font-medium text-gray-600 dark:text-gray-400">
        <a href="#" class="pb-2 border-b-2 border-blue-600 text-blue-600 dark:text-blue-400">Albums</a>
        <a href="#" class="pb-2 hover:text-blue-600 dark:hover:text-blue-400">Unassigned Photos</a>
      </nav>
    </div>
  
    <!-- Album Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <!-- Album Card -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-md transition p-4">
        <img src="https://via.placeholder.com/300x200" alt="Album Cover" class="rounded-md mb-3 w-full h-40 object-cover">
        <div>
          <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-100 truncate">Vacation 2023</h2>
          <p class="text-sm text-gray-500 dark:text-gray-400">12 Photos</p>
        </div>
        <div class="mt-4 flex justify-between items-center">
          <button class="text-sm text-blue-600 hover:underline dark:text-blue-400">View</button>
          <div class="space-x-2">
            <button class="text-sm text-gray-600 hover:text-blue-600 dark:text-gray-300 dark:hover:text-blue-400">Edit</button>
            <button class="text-sm text-red-600 hover:underline dark:text-red-400">Delete</button>
          </div>
        </div>
      </div>
  
      <!-- Repeat Album Cards -->
      <!-- ... -->
    </div>
  
    <!-- Pagination -->
    <div class="mt-6 flex justify-between items-center text-sm text-gray-600 dark:text-gray-400">
      <span>Showing 1-8 of 24 albums</span>
      <div class="space-x-1">
        <button class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded hover:bg-gray-200 dark:hover:bg-gray-700">Previous</button>
        <button class="px-3 py-1 border border-gray-300 dark:border-gray-600 rounded hover:bg-gray-200 dark:hover:bg-gray-700">Next</button>
      </div>
    </div>
  </div>

</x-adminlayout>