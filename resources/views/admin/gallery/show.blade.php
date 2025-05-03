<x-adminlayout>

  <div class="p-6">
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold text-gray-800">Manage Album: <span class="text-blue-600">Summer Vacation</span></h1>
        <p class="text-sm text-gray-500">12 images in this album</p>
      </div>
      <div class="space-x-2">
        <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 text-sm">
          + Add Images
        </button>
        <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 text-sm">
          Back to Albums
        </button>
      </div>
    </div>
  
    <!-- Image Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
      <!-- Single Image Card -->
      <div class="relative group bg-white border rounded shadow-sm overflow-hidden">
        <img src="https://via.placeholder.com/300x200" alt="Album Image"
             class="w-full h-32 sm:h-40 object-cover" />
        <div class="p-2">
          <p class="text-xs text-gray-700 truncate">beach_sunset.jpg</p>
        </div>
        <!-- Actions on Hover -->
        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center space-x-2">
          <button class="bg-white text-xs px-2 py-1 rounded hover:bg-gray-100">Edit</button>
          <button class="bg-white text-xs px-2 py-1 rounded hover:bg-gray-100">Move</button>
          <button class="bg-red-600 text-white text-xs px-2 py-1 rounded hover:bg-red-700">Remove</button>
        </div>
      </div>
  
      <!-- Repeat Image Cards -->
      <!-- ... -->
    </div>
  
    <!-- Pagination -->
    <div class="mt-6 flex justify-between items-center text-sm text-gray-600">
      <span>Showing 1–12 of 48 photos</span>
      <div class="space-x-1">
        <button class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-200">Previous</button>
        <button class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-200">Next</button>
      </div>
    </div>
  </div>
  
  
</x-adminlayout>