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
            <input type="file" wire:model="image">

                @if ($image) 
                    <img src="{{ $photo->temporaryUrl() }}">
                @endif
            
            @error('image') <span class="error">{{ $message }}</span> @enderror
            
            <button type="submit">Save Images</button>


  </form>
</div>