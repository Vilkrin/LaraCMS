<div class="p-6 max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow rounded-lg">
  <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">Upload Images</h1>

  <form class="space-y-6" wire:submit="save">

    <div class="mb-4">
        <div class="relative"     
                x-data="{ uploading: false, progress: 0 }"
                x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false"
                x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
        >

        <!-- Upload Box -->
            <label 
                for="image"
                class="flex flex-col items-center justify-center border-2 border-dashed rounded-xl h-48 cursor-pointer 
                       transition ease-in-out duration-200
                       hover:bg-blue-50 dark:hover:bg-blue-900
                       border-gray-300 dark:border-gray-600
                       text-gray-600 dark:text-gray-300
                       relative"
                :class="{ 'border-blue-500 bg-blue-50 dark:bg-blue-900': isDragging }"
            >
                <div class="flex flex-col items-center space-y-2">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                    </svg>

                    <p class="text-sm">Click or drag an image to upload</p>
                </div>
                <input type="file" wire:model="image" id="image" class="hidden" />
            </label>

            @if ($image)
                <div class="mt-4">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Preview:</p>
                    <img src="{{ $image->temporaryUrl() }}" class="max-w-xs rounded shadow border border-gray-300 dark:border-gray-700">
                </div>
            @endif
            
            @error('image') <span class="error">{{ $message }}</span> @enderror
            
        <div class="pt-4">
            <button 
                type="submit" 
                class="cursor-pointer px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition"
            >
                Save Image
            </button>
        </div>


  </form>
</div>