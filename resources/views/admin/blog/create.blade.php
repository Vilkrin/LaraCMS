<x-adminlayout>
<div>
  <flux:legend class="mb-5">Create Post</flux:legend>
  @if ($errors->any())

    <div class="bg-red-100 border border-l-4 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

  <form method="post" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-5">
      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Title</label>
      <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title"  />
    </div>

    <div class="mb-5">
      <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Slug</label>
      <input type="slug" id="slug" name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="slug"  />
    </div>

    <div class="mb-5">
      <flux:input type="file" wire:model="post_image" label="Upload Image" multiple />
    </div>

    <div class="mb-5">
      <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Content</label>
      <textarea id="body" name="body" rows="5" placeholder="Post Content Here." class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
    </div>

    {{-- <x-forms.tinymce-editor/> --}}

    <flux:button type="submit">Save</flux:button>
    
  </form>

</div>

</x-adminlayout>