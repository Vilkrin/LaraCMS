<div>
    <div class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Edit User</h2>
        <form wire:submit.prevent="updateUser">
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" wire:model="name" class="w-full p-2 border rounded">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" wire:model="email" class="w-full p-2 border rounded">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
    
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Save</button>
            <a href="{{ route('admin.users.index') }}" class="ml-2 px-4 py-2 bg-gray-500 text-white rounded">Cancel</a>
        </form>
    </div>
</div>
