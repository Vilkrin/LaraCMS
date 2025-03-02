@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 lg:flex lg:space-x-8">
    <!-- Blog Entries -->
    <div class="lg:w-2/3">
        @foreach($featuredPosts as $post)
        <div class="bg-white shadow-lg rounded-lg mb-6 overflow-hidden">
            <img class="w-full" src="{{ $post->image }}" alt="{{ $post->title }}" />
            <div class="p-6">
                <p class="text-sm text-gray-500">{{ $post->published_at->format('F j, Y') }}</p>
                <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
                <p class="text-gray-600">{{ $post->excerpt }}</p>
                <a class="inline-block text-blue-500 mt-2" href="{{ route('blog.show', $post) }}">Read more →</a>
            </div>
        </div>
        @endforeach

        <!-- Pagination for Featured Posts -->
        <div class="mt-4">
            {{ $featuredPosts->links() }}
        </div>

        <!-- Smaller Blog Posts -->
        <div class="grid md:grid-cols-2 gap-6 mt-6">
            @foreach($regularPosts as $post)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img class="w-full" src="{{ $post->image }}" alt="{{ $post->title }}" />
                <div class="p-4">
                    <p class="text-sm text-gray-500">{{ $post->published_at->format('F j, Y') }}</p>
                    <h3 class="text-lg font-bold">{{ $post->title }}</h3>
                    <p class="text-gray-600">{{ $post->excerpt }}</p>
                    <a class="inline-block text-blue-500 mt-2" href="{{ route('blog.show', $post) }}">Read more →</a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination for Regular Posts -->
        <div class="mt-4">
            {{ $regularPosts->links() }}
        </div>
    </div>

    <!-- Sidebar Widgets -->
    <div class="lg:w-1/3 space-y-6">
        <!-- Search Widget -->
        <div class="border rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-200 px-4 py-3 font-bold">Search</div>
            <div class="p-4">
                <form action="{{ route('blog.search') }}" method="GET">
                    <input type="text" name="query" class="w-full border rounded-sm p-2" placeholder="Enter search term...">
                    <button type="submit" class="mt-2 w-full bg-blue-500 text-white py-2 rounded-sm">Go!</button>
                </form>
            </div>
        </div>

        <!-- Categories Widget -->
        <div class="border rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-200 px-4 py-3 font-bold">Categories</div>
            <div class="p-4">
                <ul class="space-y-2">
                    @foreach($categories as $category)
                    <li><a href="{{ route('blog.category', $category) }}" class="text-blue-500">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Recent Posts Widget -->
        <div class="border rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-200 px-4 py-3 font-bold">Recent Posts</div>
            <div class="p-4">
                <ul class="space-y-2">
                    @foreach($recentPosts as $post)
                    <li><a href="{{ route('blog.show', $post) }}" class="text-blue-500">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Placeholder Widget -->
        <div class="border rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-200 px-4 py-3 font-bold">Placeholder Widget</div>
            <div class="p-4">
                <p class="text-gray-600">This is a placeholder widget. You can add any content here.</p>
            </div>
        </div>
    </div>
</div>
@endsection
