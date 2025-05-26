<x-adminlayout>

<div>
        <!-- Breadcrumb -->
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li><a href="#" class="text-gray-700 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">Home</a></li>
                <li><span class="mx-2 text-gray-500 dark:text-gray-400">/</span></li>
                <li><a href="#" class="text-gray-700 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">Pages</a></li>
                <li><span class="mx-2 text-gray-500 dark:text-gray-400">/</span></li>
                <li><span class="text-gray-500 dark:text-gray-400">Text Editor</span></li>
            </ol>
        </nav>

        <!-- Editor Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Add a new post</h1>
            <div class="flex gap-3">
                <button class="px-4 py-2 text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                    Move to trash
                </button>
                <button class="px-4 py-2 text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                    Schedule
                </button>
                <button class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Publish
                </button>
            </div>
        </div>

        <!-- Editor Content -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Main Editor -->
            <div class="lg:col-span-3">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
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
                    {{-- <x-forms.tinymce-editor/> --}}
                    </div>
        
                    <flux:button type="submit">Save</flux:button>
                    
                </form>  

                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Status Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    <h3 class="text-lg font-medium mb-4 text-gray-900 dark:text-white">Status</h3>
                    <div class="space-y-2">
                        <label class="flex items-center text-gray-900 dark:text-white">
                            <input type="radio" name="status" class="mr-2" checked>
                            <span>Draft</span>
                        </label>
                        <label class="flex items-center text-gray-900 dark:text-white">
                            <input type="radio" name="status" class="mr-2">
                            <span>Published</span>
                        </label>
                    </div>
                </div>

                <!-- Visibility Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    <h3 class="text-lg font-medium mb-4 text-gray-900 dark:text-white">Visibility</h3>
                    <div class="space-y-2">
                        <label class="flex items-center text-gray-900 dark:text-white">
                            <input type="radio" name="visibility" class="mr-2" checked>
                            <span>Public</span>
                        </label>
                        <label class="flex items-center text-gray-900 dark:text-white">
                            <input type="radio" name="visibility" class="mr-2">
                            <span>Protected</span>
                        </label>
                        <label class="flex items-center text-gray-900 dark:text-white">
                            <input type="radio" name="visibility" class="mr-2">
                            <span>Private</span>
                        </label>
                    </div>
                </div>

                <!-- Category Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    <h3 class="text-lg font-medium mb-4 text-gray-900 dark:text-white">Category</h3>
                    <select name="category_id" class="w-full border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out mb-4">
                        <option value="">Select a Category</option>
                        @forelse($blogCategories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @empty
                            <option disabled>No categories available</option>
                        @endforelse
                    </select>
                    <button type="button" class="flex items-center gap-2 px-3 py-2 mt-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Add Category                          
                    </button>
                </div>

                <!-- Tags Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    <h3 class="text-lg font-medium mb-4 text-gray-900 dark:text-white">Tags</h3>
                    <select name="tags[]" multiple class="w-full border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        @forelse($tags as $tag)
                            <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @empty
                            <option disabled>No tags available</option>
                        @endforelse
                    </select>
             
                </div>

                <!-- Featured Image Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    <h3 class="text-lg font-medium mb-4 text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg border border-gray-200 dark:border-gray-600">Featured Image</h3>
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Click to upload or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                </div>
            </div>
        </div>
</div>

</x-adminlayout>