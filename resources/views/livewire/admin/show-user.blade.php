<div>
    <div class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4">User Details</h2>
        <div class="mb-4">
            <strong>Name:</strong> {{ $user->name }}
        </div>
        <div class="mb-4">
            <strong>Email:</strong> {{ $user->email }}
        </div>
        <div class="mb-4">
            <strong>Created At:</strong> {{ $user->created_at->format('d M Y, H:i') }}
        </div>
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Back</a>
        <a href="{{ route('admin.users.edit', $user->id) }}" class="ml-2 px-4 py-2 bg-yellow-500 text-white rounded">Edit</a>
    </div>
</div>
