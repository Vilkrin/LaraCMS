<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">{{ $album->name }}</h2>
    <div class="grid grid-cols-5 gap-4">
        @foreach ($images as $image)
            <a href="{{ route('gallery.image', [$album->slug, $image->id]) }}">
                <img src="{{ $image->url }}" alt="" class="w-full h-40 object-cover rounded-xl">
            </a>
        @endforeach
    </div>
</div>