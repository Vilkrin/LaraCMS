<x-layout>
  <x-slot:heading>
      Gallery
  </x-slot:heading>
  <h2>Photo: {{ $photo->name }}</h2>
  <img src="{{ $photo->getUrl() }}" alt="{{ $photo->name }}" width="600">
  
</x-layout>