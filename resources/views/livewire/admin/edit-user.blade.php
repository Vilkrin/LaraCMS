<div>


    <div class="flex items-center justify-center p-4">
        <div class="w-full max-w-2xl rounded-lg shadow-lg p-6 bg-white dark:bg-gray-800">
            @if (session()->has('message'))
                <div class="mb-4 p-3 rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                    {{ session('message') }}
                </div>
            @endif
            <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl font-semibold mb-4">Edit User</h2>
                @if ($status === 'banned')
                <flux:button variant="secondary" wire:click="unban">Unban User</flux:button>
                @endif


                @if ($status !== 'banned')
                    <flux:button variant="danger" wire:click="ban" onclick="return confirm('Are you sure you want to ban this user?')">
                        Ban User
                    </flux:button>
                @endif
            </div>
            <form wire:submit="save" class="space-y-6 bg-white dark:bg-gray-800 p-6">
                @csrf          
                <!-- Username -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                    <input type="text" wire:model="name"
                        class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-300 px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter username">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            
                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" wire:model="email"
                        class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-300 px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter email">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            
                <!-- Password -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <input type="password" wire:model="password"
                            class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-300 px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="New password">
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                        <input type="password" wire:model="password_confirmation"
                            class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-300 px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Confirm password">
                    </div>
                </div>
            
                <!-- Roles -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roles</label>
                    <div class="flex flex-wrap gap-3 mt-2">
                        @foreach($availableRoles as $role)
                            <label class="flex items-center space-x-2 text-gray-900 dark:text-gray-300">
                                <input type="checkbox" wire:model="roles" value="{{ $role }}"
                                    class="h-5 w-5 text-indigo-600 border-gray-300 dark:border-gray-600 focus:ring-indigo-500 rounded">
                                <span class="capitalize">{{ $role }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('roles') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            
                
                <div class="flex items-center justify-between">
                    <flux:button variant="primary" type="submit">Save</flux:button>
                    <flux:button variant="filled" href="{{ route('admin.users.index') }}" >Cancel</flux:button>
                </div>
            </form>
            
            
            
        </div>
    </div>
</div>
