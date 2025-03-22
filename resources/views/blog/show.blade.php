<x-layout>
  <x-slot:heading>
      Blog Post
  </x-slot:heading>

<div>
    <div>
        <h1>{{ $post->title }}</h1>
        <h2 class="p-2">by <a href="#"> {{ $post->user->name }} </a></h2>
    </div>

    <flux:separator />
    <flux:subheading class="p-2" size="lg">Posted: {{ $post->created_at->diffForHumans() }}</flux:subheading>
    <flux:separator />
    <div class="p-2">
        <img class="w-full" src="{{ $post->post_image ? asset('storage/' . $post->post_image) : asset('placeholder/850.jpg') }}" alt="{{ $post->title }}">
    </div>
    <flux:separator />
    <div class="p-2">
        <p>{{ $post->body }}</p>        
    </div>
    <flux:separator />

</div>


</x-layout>
