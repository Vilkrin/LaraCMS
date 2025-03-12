   <div>
   <!-- Users Table -->
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
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <!-- Search Icon -->
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input wire:model.debounce.500ms="search" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required>
                        </div>
                    </form>
                </div>
                
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 shrink-0">
                    <!-- Roles, Groups & Permissions Button -->
                    <button wire:click="addPerms" type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-hidden dark:focus:ring-primary-800">
                        <!-- Add Icon -->
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Roles, Groups & Permissions
                    </button>
                    <!-- Add User Button -->
                    <button wire:click="addUser" type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-hidden dark:focus:ring-primary-800">
                        <!-- Add Icon -->
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add User
                    </button>
                </div>
            </div>
        </x-slot>
        <x-slot name="head">
            <x-table.heading>Avatar</x-table.heading>
            <x-table.heading>Username</x-table.heading>
            <x-table.heading>Email</x-table.heading>
            <x-table.heading>Email Verified</x-table.heading>
            <x-table.heading>Account Created</x-table.heading>
            <x-table.heading>Role</x-table.heading>
            <x-table.heading>Group</x-table.heading>
            <x-table.heading>2fa Status</x-table.heading>
            <x-table.heading>Actions</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @foreach ( $users as $user )
            <x-table.row> 
                <x-table.cell><img src="{{asset('/assets/img/avatars/'. ($user->profile_photo_path ?? 'default-avatar.jpg'))}}" class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" alt="avatar"></x-table.cell>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email }}</x-table.cell>
                <x-table.cell>{{ $user->email_verified_at }}</x-table.cell>
                <x-table.cell>{{ $user->created_at }}</x-table.cell>
                <x-table.cell>Soon</x-table.cell>
                <x-table.cell>Soon</x-table.cell>
                <x-table.cell>{{ $user->two_factor_confirmed_at }}</x-table.cell>
                <x-table.cell>
                    <div class="flex items-center space-x-4">
                        <!-- View Button -->
                        <a href="{{ route('admin.users.show', $user->id) }}">
                            <button><span class="fa-regular fa-eye px-2"></span></button>
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('admin.users.edit', $user->id) }}">
                            <button><span class="fa-solid fa-pen-to-square px-2"></span></button>
                        </a>

                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><span class="fa-solid fa-trash px-2"></span></button>
                            <flux:button icon="trash" variant="subtle" wire:click="delete({{ $user->id }})" wire:confirm="Are you sure?">Delete</flux:button>
                        </form>
                    </div>
                </x-table.cell>
            </x-table.row>
            @endforeach

        </x-slot>

        
    </x-table>
    <div class="py-2 px-2">
        {{ $users->links() }}
    </div>
</div>
