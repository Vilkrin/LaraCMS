<x-layout>
  <x-slot:heading>
      Gallery
  </x-slot:heading>
  <h2>{{ $album->album_name }}</h2>
  <p>{{ $album->description }}</p>
  
  <div class="album-images">
      @foreach($album->media as $media)
          <a href="{{ route('gallery.showPhoto', $media->id) }}">
              <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" width="300">
          </a>
      @endforeach
  </div>
</x-layout>