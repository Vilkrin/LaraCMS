<x-adminlayout>

    <x-admin.alerts />

  <x-table>
      
    <x-slot name="advancedheader">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                <flux:input icon="magnifying-glass" placeholder="Search posts"  />
            </div>
            
            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 shrink-0">
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
                    <flux:button class="cursor-pointer" href="{{ route('admin.blog.show', $post->id) }}" icon="eye">View</flux:button>
                    <flux:button class="cursor-pointer" href="{{ route('admin.blog.edit', $post->id) }}" icon="pencil-square">Edit</flux:button>
                    <flux:button class="cursor-pointer" wire:click="confirmDelete({{ $post->id }})" icon="trash" variant="danger">Delete</flux:button>
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
  
    <!-- Delete Confirmation Modal -->
    {{-- <x-modal wire:model="showDeleteModal">
        <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                        {{ __('Delete User') }}
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ __('Are you sure you want to delete this user? This action cannot be undone.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <flux:button wire:click="deleteUser" variant="danger" class="w-full sm:ml-3 sm:w-auto">
                {{ __('Delete') }}
            </flux:button>
            <flux:button wire:click="$set('showDeleteModal', false)" variant="filled" class="mt-3 w-full sm:mt-0 sm:ml-3 sm:w-auto">
                {{ __('Cancel') }}
            </flux:button>
        </div>
    </x-modal> --}}

</x-adminlayout>