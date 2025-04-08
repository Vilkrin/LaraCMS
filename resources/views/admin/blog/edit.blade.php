<x-adminlayout :title="__('Dashboard')">

  <div>
    <flux:legend class="mb-5">Edit Post</flux:legend>
    @if ($errors->any())
  
      <div class="bg-red-100 border border-l-4 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  
          <ul>
  
              @foreach ($errors->all() as $error)
  
                  <li>{{ $error }}</li>
  
              @endforeach
  
          </ul>
  
      </div>
  
  @endif
  
    <form method="post" action="{{ route('admin.blog.update', $post->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="mb-5">
        <flux:input wire:model="title" label="Post Title" placeholder="Title" value="{{ $post->title }}" />
      </div>
  
      <div class="mb-5">
        <flux:input type="file" wire:model="post_image" label="Upload Image" multiple />
      </div>

      <div class="mb-5">
        <img class="h-auto max-w-xs" src="{{ $post->post_image ? asset('storage/' . $post->post_image) : asset('placeholder/850.jpg') }}" alt="{{ $post->title }}">
      </div>
  
      <div class="mb-5">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Content</label>
        <textarea id="body" name="body" rows="5" placeholder="Post Content Here." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
          {{ $post->body }}
        </textarea>

        {{-- <x-forms.tinymce-editor/> --}}
      </div>
      
     <flux:button type="submit">Save</flux:button>

    </form>
</div>

</x-adminlayout>