<x-layout>
  <x-slot:heading>
      Gallery
  </x-slot:heading>


  <h1>Gallery</h1>
    <!-- Display Albums -->
    @foreach($albums as $album)
        <h3>{{ $album->album_name }}</h3>
        <div class="album">
            @foreach($album->media as $media)
                <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}">
            @endforeach
        </div>
    @endforeach

</x-layout>


@foreach($albums as $album)
    <div class="album">
        <h3><a href="{{ route('gallery.show', $album->slug) }}">{{ $album->album_name }}</a></h3>
        @foreach($album->media as $media)
            <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" width="150">
        @endforeach
    </div>
@endforeach