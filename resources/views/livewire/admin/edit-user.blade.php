<div>
    <div class="flex items-center justify-center p-4">
        <div class="w-full max-w-2xl rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Edit User</h2>
            {{-- <pre>{{ dd($user) }}</pre> --}}
            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                    <input type="text" id="name" wire:model="name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        placeholder="Enter username">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" wire:model="email"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        placeholder="Enter email">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <input type="password" id="password" wire:model="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        placeholder="Enter new password (optional)">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                    <input type="password" id="password_confirmation" wire:model="password_confirmation"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200"
                        placeholder="Confirm new password">
                </div>
            
                <!-- Role Selection -->
                <div>
                    <label for="roles" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roles</label>
                    <select id="roles" wire:model="roles" multiple
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">
                        @foreach($availableRoles as $role)
                            <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                        @endforeach
                    </select>
                    @error('roles') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            
                <!-- Save & Cancel Buttons -->
                <div class="flex items-center justify-between">
                    <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
                    <flux:button variant="filled" href="{{ route('admin.users.index') }}">Cancel</flux:button>                    
                </div>
            </form>
            
        </div>
    </div>
</div>
