<x-adminlayout>

  <div class="p-6 max-w-3xl mx-auto bg-white shadow rounded-lg">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Create New Album</h1>
  
    <form class="space-y-6">
      <!-- Album Name -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Album Title</label>
        <input type="text" placeholder="e.g. Summer Vacation"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>
  
      <!-- Slug (Optional) -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Slug (optional)</label>
        <input type="text" placeholder="summer-vacation"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>
  
      <!-- Description -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea rows="4" placeholder="Brief description of the album..."
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
      </div>
  
      <!-- Cover Image -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
        <input type="file" class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
      </div>
  
      <!-- Submit -->
      <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
          Save Album
        </button>
      </div>
    </form>
  </div>
  

</x-adminlayout>