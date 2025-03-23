<x-adminlayout>

  <x-table>

        
    <x-slot name="advancedheader">
        @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-sm relative mb-4">
            {{ session('message') }}
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                &times;
            </button>
        </div>
        @endif
    
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                <flux:input icon="magnifying-glass" placeholder="Search posts" wire:model="query" wire:keydown.enter="searchPosts" />
            </div>
            
            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 shrink-0">
                <!-- Blog Categories Button -->
                <flux:button href="{{ route('admin.blog.categories') }}" icon="plus-circle">Create Category</flux:button>
                <!-- Add Blog Post Button -->
                <flux:button href="{{ route('admin.blog.create') }}" icon="plus-circle">Create Post</flux:button>
            </div>
        </div>
    </x-slot>
    <x-slot name="head">
        <x-table.heading>Post Title</x-table.heading>
        <x-table.heading>Image</x-table.heading>
        <x-table.heading>User</x-table.heading>
        <x-table.heading>Created</x-table.heading>
        <x-table.heading>Updated</x-table.heading>
        <x-table.heading>Status</x-table.heading>
        <x-table.heading>Actions</x-table.heading>
    </x-slot>

    <x-slot name="body">
        @foreach ( $posts as $post )
        <x-table.row> 
            <x-table.cell>{{ $post->title }}</x-table.cell>
            <x-table.cell>
                <img class="h-auto max-w-xs" src="{{ $post->post_image ? asset('storage/' . $post->post_image) : asset('storage/placeholder/850.jpg') }}" alt="{{ $post->title }}">
            </x-table.cell>
            <x-table.cell>{{ $post->user->name }}</x-table.cell>
            <x-table.cell>{{ $post->created_at->diffForHumans() }}</x-table.cell>
            <x-table.cell>{{ $post->updated_at->diffForHumans() }}</x-table.cell>
            <x-table.cell>Not Published</x-table.cell>
            <x-table.cell>
                <div class="flex items-center space-x-4">
                    <!-- View Button -->
                    <a href="#">
                        <button class="rounded-lg cursor-pointer"><span class="fa-regular fa-eye px-2"></span></button>
                    </a>

                    <!-- Edit Button -->
                    <a href="{{ route('admin.blog.edit', $post->id) }}">
                        <button class="rounded-lg cursor-pointer"><span class="fa-solid fa-pen-to-square px-2"></span></button>
                    </a>

                    <!-- Delete Button -->
                    <form method="POST" action="{{ route('admin.blog.destroy', $post->id) }}" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button class="rounded-lg cursor-pointer" type="submit"><span class="fa-solid fa-trash px-2"></span></button>
                       
                    </form>
                </div>
            </x-table.cell>
        </x-table.row>
        @endforeach

    </x-slot>

    
</x-table>
<div class="py-2 px-2">
    {{ $posts->links() }}
</div>
  
</x-adminlayout>