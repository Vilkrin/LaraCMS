<div>
    <x-admin.alerts />

    <x-table>
        <x-slot name="advancedheader">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                wire:model.live.debounce="search"
                                placeholder="Search users...">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3">
                    <flux:button href="{{ route('admin.roles.index') }}" icon="shield-check">Roles & Permissions</flux:button>
                    <flux:button href="{{ route('admin.users.create') }}" icon="user-plus">Add User</flux:button>
                </div>
            </div>
        </x-slot>

        <x-slot name="head">
            <x-table.heading>Avatar</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null">Username</x-table.heading>
            <x-table.heading>User Role</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('email')" :direction="$sortField === 'email' ? $sortDirection : null">Email</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('email_verified_at')" :direction="$sortField === 'email_verified_at' ? $sortDirection : null">Email Verified</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sortField === 'created_at' ? $sortDirection : null">Account Created</x-table.heading>
            <x-table.heading>2FA Status</x-table.heading>
            <x-table.heading>Last Login</x-table.heading>
            <x-table.heading>Actions</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @forelse ($users as $user)
                <x-table.row>
                    <x-table.cell>
                        <img src="#" 
                        class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" 
                        alt="{{ $user->name }}'s avatar">
                        {{-- <img src="{{ $user->getAvatarUrl() }}" 
                            class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" 
                            alt="{{ $user->name }}'s avatar"> --}}
                    </x-table.cell>
                    <x-table.cell>{{ $user->name }}</x-table.cell>
                    <x-table.cell class="whitespace-nowrap">{{ $user->getRoleNames()->implode(', ') }}</x-table.cell>
                    <x-table.cell>{{ $user->email }}</x-table.cell>
                    <x-table.cell>{{ $user->email_verified_at ? 'Yes' : 'No' }}</x-table.cell>
                    <x-table.cell>{{ $user->created_at->format('M d, Y') }}</x-table.cell>
                    <x-table.cell>{{ $user->two_factor_confirmed_at ? 'Enabled' : 'Disabled' }}</x-table.cell>
                    <x-table.cell>{{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}</x-table.cell>
                    <x-table.cell>
                        <div class="flex items-center space-x-4">
                            <flux:button class="cursor-pointer" href="{{ route('admin.users.show', $user->id) }}" icon="eye">View</flux:button>
                            <flux:button class="cursor-pointer" href="{{ route('admin.users.edit', $user->id) }}" icon="pencil-square">Edit</flux:button>
                            <flux:button class="cursor-pointer" wire:click="confirmDelete({{ $user->id }})" icon="trash" variant="danger">Delete</flux:button>
                        </div>
                    </x-table.cell>
                </x-table.row>
            @empty
                <x-table.row>
                    <x-table.cell colspan="9" class="text-center py-4">
                        <div class="text-gray-500 dark:text-gray-400">No users found.</div>
                    </x-table.cell>
                </x-table.row>
            @endforelse
        </x-slot>
    </x-table>

    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
        {{ $users->links() }}
    </nav>

    <!-- Delete Confirmation Modal -->
    <x-modal wire:model="showDeleteModal">
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
    </x-modal>

</div>
