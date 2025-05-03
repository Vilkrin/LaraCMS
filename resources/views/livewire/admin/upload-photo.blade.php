<div class="p-6 max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow rounded-lg">
  <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Upload Images</h1>

  <form class="space-y-6" wire:submit="save">
    <!-- Album Selector -->
    <div>
      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Assign to Album (optional)</label>
      <select class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">-- No Album --</option>
        <option>Summer 2023</option>
        <option>Projects</option>
      </select>
    </div>

    @if ($photos) 
        <img src="{{ $photo->temporaryUrl() }}">
    @endif

    <!-- File Upload -->
    <div>
      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Select Images</label>
      <input type="file" wire:model="photo" multiple
             class="block w-full text-sm text-gray-700 dark:text-gray-100 dark:bg-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" />
    </div>

    @error('photo') <span class="error">{{ $message }}</span> @enderror

    <!-- Upload Button -->
    <div class="flex justify-end">
      <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
        Upload
      </button>
    </div>
  </form>
</div>
