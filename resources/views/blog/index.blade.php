<x-layout>
<div class="flex-grow flex flex-col lg:flex-row">

    <!-- Blog Entries -->
    <div class="lg:w-2/3 w-full px-4">
        @foreach($posts as $post)
        <div class="bg-white dark:bg-gray-700 shadow-lg rounded-lg mb-6 overflow-hidden">

            <img class="w-full" src="{{ $post->post_image ? asset('storage/' . $post->post_image) : asset('storage/placeholder/850.jpg') }}" alt="{{ $post->title }}">

            <div class="p-6">
                <p class="text-sm text-gray-300">
                    {{ $post->published_at ? $post->published_at->format('F j, Y') : 'Not Published' }}
                </p>                
                <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
                <p class="text-gray-300">{{ Str::limit($post->body, '150', '.....') }}</p>
                <a class="inline-block text-blue-500 mt-2" href="{{ route('blog.show', ['slug' => $post->slug]) }}">
                    Read more →
                </a>
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <div class="mt-4 text-gray-900 dark:text-gray-100">
            {{ $posts->links() }}
        </div>
    </div>


    <!-- Sidebar Widgets -->
    <div class="lg:w-1/3 w-full space-y-6 p-4">
        <!-- Search Widget -->
        <div class="border  rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-200 dark:bg-gray-700 px-4 py-3 font-bold">Search</div>
            <div class="p-4">
                {{-- <form action="{{ route('blog.search') }}" method="GET"> --}}
                    <input type="text" name="query" class="w-full border rounded-sm p-2" placeholder="Enter search term...">
                    <button type="submit" class="mt-2 w-full bg-blue-500 text-white py-2 rounded-sm">Go!</button>
                {{-- </form> --}}
            </div>
        </div>

        <!-- Categories Widget -->
        <div class="border rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-200 dark:bg-gray-700 px-4 py-3 font-bold">Categories</div>
            <div class="p-4">
                <ul class="space-y-2">
                    {{-- @foreach($categories as $category)
                    <li><a href="{{ route('blog.category', $category) }}" class="text-blue-500">{{ $category->name }}</a></li>
                    @endforeach --}}
                </ul>
            </div>
        </div>

        <!-- Recent Posts Widget -->
        <div class="border rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-200 dark:bg-gray-700 px-4 py-3 font-bold">Recent Posts</div>
            <div class="p-4">
                <ul class="space-y-2">
                    {{-- @foreach($recentPosts as $post)
                    <li><a href="{{ route('blog.show', $post) }}" class="text-blue-500">{{ $post->title }}</a></li>
                    @endforeach --}}
                </ul>
            </div>
        </div>

        <!-- Placeholder Widget -->
        <div class="border rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-200 dark:bg-gray-700 px-4 py-3 font-bold">Placeholder Widget</div>
            <div class="p-4">
                <p class="text-gray-600">This is a placeholder widget. You can add any content here.</p>
            </div>
        </div>
    </div>
</div>
</x-layout>
