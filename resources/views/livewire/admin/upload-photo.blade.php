<div class="p-6 max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow rounded-lg">
  <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Upload Images</h1>

  <form class="space-y-6" wire:submit.prevent="save">
    <!-- Album Selector -->
    <div>
      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Assign to Album (optional)</label>
      <select class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">-- No Album --</option>
        <option>Summer 2023</option>
        <option>Projects</option>
      </select>
    </div>

    <div class="mb-4">
        <div class="relative">
            <input 
                type="file" 
                wire:model="images" 
                class="form-control" 
                accept="image/*"
                multiple
                id="file-upload"
            >
            <label for="file-upload" class="cursor-pointer">
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition-colors">
                    <div class="flex flex-col items-center">
                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <span class="text-gray-500">Click to select or drag and drop images</span>
                        <span class="text-sm text-gray-400 mt-1">PNG, JPG, GIF up to 20MB</span>
                    </div>
                </div>
            </label>
        </div>
        @error('images.*') 
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
        @enderror
    </div>

    {{-- Image Previews for Selected Files --}}
    @if ($images)
        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2">Preview Selected Images</h2>
            <div class="flex flex-wrap gap-4">
                @foreach ($images as $image)
                    <div>
                        <img src="{{ $image->temporaryUrl() }}" class="w-24 h-24 object-cover rounded border" alt="Preview">
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if($isUploading)
        <div class="mb-4">
            <div class="flex items-center space-x-2">
                <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-500"></div>
                <div class="text-sm text-gray-500">
                    Uploading images... {{ round($uploadProgress) }}%
                </div>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $uploadProgress }}%"></div>
            </div>
        </div>
    @endif

    <!-- Error Messages -->
    @if (session()->has('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            {{ session('error') }}
        </div>
    @endif

    <!-- Success Messages -->
    @if (session()->has('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <button 
            type="submit" 
            class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
            {{ count($images) === 0 ? 'disabled' : '' }}
        >
            Upload {{ count($images) }} Images
        </button>
    </div>

    <!-- Existing Images -->
    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Uploaded Images</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($existingImages as $image)
                <div class="relative group">
                    <img 
                        src="{{ $image->getUrl() }}" 
                        class="w-full h-32 object-cover rounded-lg"
                        alt="Uploaded image"
                    >
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-200 rounded-lg flex items-center justify-center">
                        <button 
                            wire:click="removeImage({{ $image->id }})"
                            class="opacity-0 group-hover:opacity-100 bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition-all duration-200"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
  </form>
</div>