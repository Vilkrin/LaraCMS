<div>
    <div class="flex items-center justify-center p-4">
        <div class="w-full max-w-2xl rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Edit User</h2>
            {{-- <pre>{{ dd($user) }}</pre> --}}
            <form wire:submit.prevent="updateUser" enctype="multipart/form-data" class="space-y-4">
                <!-- Avatar Preview & Upload -->
                <div class="flex items-center gap-4">
                    <div class="w-24 h-24 rounded-full overflow-hidden border border-gray-300 dark:border-gray-600">
                        <img id="avatarPreview" 
                             src="{{ $avatar ? $avatar->temporaryUrl() : $user->getAvatarUrl() }}" 
                             alt="Avatar" 
                             class="w-full h-full object-cover">
                    </div>
            
                    <flux:input type="file" wire:model="avatar" label="Avatar" class="w-auto"/>
                </div>
            
                <!-- Username -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                    <input type="text" id="name" wire:model.defer="user.name" placeholder="{{ $user->name }}"
                           class="w-full mt-1 p-2 border rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600 focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" wire:model.defer="user.email" placeholder="{{ $user->email }}"
                           class="w-full mt-1 p-2 border rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600 focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            
                <!-- Password and Confirm Password -->
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <input type="password" id="password" wire:model="password" placeholder="••••••••"
                               class="w-full mt-1 p-2 border rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600 focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="w-1/2">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                        <input type="password" id="password_confirmation" wire:model="password_confirmation" placeholder="••••••••"
                               class="w-full mt-1 p-2 border rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600 focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
            
                <!-- Role Selection -->
                <div class="mb-6">
                    <flux:checkbox.group wire:model="roles" label="Roles">
                        @foreach($availableRoles as $role)
                            <flux:checkbox label="{{ ucfirst($role) }}" value="{{ $role }}" />
                        @endforeach
                    </flux:checkbox.group>
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
