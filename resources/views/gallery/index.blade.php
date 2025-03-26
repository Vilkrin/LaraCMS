<x-layout>
  <x-slot:heading>
      Gallery
  </x-slot:heading>


    <!-- Display Albums -->
    @foreach($albums as $album)
    <div class="album">
        <h3><a href="{{ route('gallery.showAlbum', $album->slug) }}">{{ $album->album_name }}</a></h3>
        
        @if($album->media->isNotEmpty())
            <img src="{{ $album->media->first()->getUrl() }}" alt="{{ $album->album_name }} cover photo" width="150">
        @endif
    </div>
    @endforeach

</x-layout>