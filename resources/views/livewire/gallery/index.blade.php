<div class="grid grid-cols-5 gap-4 p-6">
    @foreach ($albums as $album)
        <a href="{{ route('gallery.album', $album->slug) }}" class="block bg-gray-100 dark:bg-gray-800 p-4 rounded-xl shadow">
            <img src="{{ $album->cover_url }}" alt="{{ $album->name }}" class="w-full h-40 object-cover rounded">
            <div class="mt-2 text-center text-lg font-semibold">{{ $album->name }}</div>
        </a>
    @endforeach
</div>