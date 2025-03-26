<div>
    <div class="flex items-center justify-center p-4">
        <div class="w-full max-w-2xl rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Edit User</h2>
            <form wire:submit.prevent="save" class="space-y-4">
                <!-- Avatar -->
                <div class="flex items-center gap-4">
                    <div class="w-24 h-24 rounded-full overflow-hidden border border-gray-300 dark:border-gray-600">
                        <img id="avatarPreview"
                            src="{{ $avatar ? $avatar->temporaryUrl() : $user->getAvatarUrl() }}"
                            alt="Avatar"
                            class="w-full h-full object-cover">
                    </div>
                    <input type="file" wire:model="avatar" class="block w-auto text-sm text-gray-900 dark:text-gray-300" />
                </div>
            
                <!-- Username -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                    <input type="text" wire:model="name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter username">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            
                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" wire:model="email"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:bg-gray-800 dark:text-gray-300"
                        placeholder="Enter email">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            
                <!-- Password -->
                <div class="mb-6 flex *:w-1/2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <input type="password" wire:model="password"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:bg-gray-800 dark:text-gray-300"
                            placeholder="New password">
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                        <input type="password" wire:model="password_confirmation"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:bg-gray-800 dark:text-gray-300"
                            placeholder="Confirm password">
                    </div>
                </div>
            
                <!-- Roles -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roles</label>
                    <div class="flex flex-wrap gap-2">
                        @foreach($availableRoles as $role)
                            <label class="inline-flex items-center text-gray-900 dark:text-gray-300">
                                <input type="checkbox" wire:model="roles" value="{{ $role }}"
                                    class="form-checkbox h-5 w-5 text-indigo-600 border-gray-300 dark:border-gray-600 focus:ring-indigo-500">
                                <span class="ml-2">{{ ucfirst($role) }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('roles') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            
                <!-- Buttons -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none">
                        Save Changes
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">
                        Cancel
                    </a>
                </div>
            </form>
            
            
        </div>
    </div>
</div>
