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
                      wire:model="image" 
                      class="form-control" 
                      accept="image/*"
                      id="file-upload"
                  >
                  <label for="file-upload" class="cursor-pointer">
                      <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition-colors">
                          <div class="flex flex-col items-center">
                              <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                              </svg>
                              <span class="text-gray-500">Click to select or drag and drop images</span>
                              <span class="text-sm text-gray-400 mt-1">PNG, JPG, GIF up to 10MB</span>
                          </div>
                      </div>
                  </label>
              </div>
              @error('image') 
                  <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
              @enderror
          </div>

          @if($isUploading)
              <div class="mb-4">
                  <div class="flex items-center space-x-2">
                      <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-500"></div>
                      <div class="text-sm text-gray-500">
                          Uploading... {{ count($uploadQueue) }} files remaining
                      </div>
                  </div>
              </div>
          @endif

          <div class="mb-4">
              <button 
                  type="submit" 
                  class="btn btn-primary"
                  {{ !$image ? 'disabled' : '' }}
              >
                  Upload Image
              </button>
          </div>

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
      </form>

</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropZone = document.querySelector('.border-dashed');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults (e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('border-blue-500');
            dropZone.classList.add('bg-blue-50');
        }

        function unhighlight(e) {
            dropZone.classList.remove('border-blue-500');
            dropZone.classList.remove('bg-blue-50');
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            // Trigger file input with dropped files
            const fileInput = document.querySelector('#file-upload');
            fileInput.files = files;
            fileInput.dispatchEvent(new Event('change'));
        }
    });
</script>
@endpush

