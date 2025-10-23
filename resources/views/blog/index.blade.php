<x-layout>
<div class="flex-grow flex flex-col lg:flex-row">

    <!-- Header -->
    <header class="bg-gray-800 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Blog Posts</h1>
                <p class="text-xl text-gray-300">Latest Updates and News</p>
            </div>
        </div>
    </header>

        <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                <div class="space-y-8">
                    <!-- Blog Post -->
                    @forelse($posts as $post)
                    <article class="bg-white dark:bg-dark-bg-secondary rounded-lg shadow-md overflow-hidden">
                        <div class="flex flex-col">
                            <div class="w-full h-[350px] bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                @if($post->getFirstMediaUrl('blog_images'))
                                    <img src="{{ $post->getFirstMediaUrl('blog_images', 'thumb') }}" alt="{{ $post->title }}" class="object-cover w-full h-full" loading="lazy">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-32 h-32 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                @endif
                            </div>
                            <div class="p-8">
                                <h2 class="text-2xl font-bold mb-4">{{ $post->title }}</h2>
                                <p class="text-gray-600 dark:text-gray-300 mb-4 text-lg">{{ Str::limit($post->body, '150', '.....') }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Posted on {{ $post->published_at ? $post->published_at->format('F j, Y') : 'Not Published' }}</span>
                                    <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-medium">Read more →</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    @empty
                    <div class="text-center text-gray-500 dark:text-gray-400 py-12">
                        No blog posts found.
                    </div>
                    @endforelse

                    <!-- Pagination -->
                    <div class="mt-4 text-gray-900 dark:text-gray-100">
                        {{ $posts->links() }}
                    </div>

                </div>
            </div>
            </div>

            <!-- Sidebar Widgets -->
            <div class="lg:w-1/3 w-full space-y-6">
                <!-- Search Widget -->
                <div class="border dark:border-gray-700 rounded-lg shadow-lg overflow-hidden bg-white dark:bg-dark-bg-secondary">
                    <div class="bg-gray-200 dark:bg-gray-700 px-4 py-3 font-bold">Search</div>
                    <div class="p-4">
                    {{-- <form action="{{ route('blog.search') }}" method="GET"> --}}
                        {{-- @csrf --}}
                        <input type="text" name="query" class="w-full border dark:border-gray-600 dark:bg-gray-800 dark:text-white rounded-sm p-2" placeholder="Enter search term...">
                        <button type="submit" class="mt-2 w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-sm">Go!</button>
                    {{-- </form> --}}
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="border dark:border-gray-700 rounded-lg shadow-lg overflow-hidden bg-white dark:bg-dark-bg-secondary">
                    <div class="bg-gray-200 dark:bg-gray-700 px-4 py-3 font-bold">Categories</div>
                    <div class="p-4">
                        <ul class="space-y-2">
                            @forelse ($categories as $category)
                            <li><a href="{{ route('blog.category', $category) }}" class="text-blue-500 dark:text-blue-400 hover:underline">{{ $category->name }}</a></li>
                            @empty
                            <li class="text-gray-500 dark:text-gray-400">No categories found.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Recent Posts Widget -->
                <div class="border dark:border-gray-700 rounded-lg shadow-lg overflow-hidden bg-white dark:bg-dark-bg-secondary">
                    <div class="bg-gray-200 dark:bg-gray-700 px-4 py-3 font-bold">Recent Posts</div>
                    <div class="p-4">
                        <ul class="space-y-2">
                            @forelse ($recentPosts as $post)
                            <li><a href="{{ route('blog.show', $post) }}" class="text-blue-500 dark:text-blue-400 hover:underline">{{ $post->title }}</a></li>
                            @empty
                            <li class="text-gray-500 dark:text-gray-400">No recent posts found.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Placeholder Widget -->
                <div class="border dark:border-gray-700 rounded-lg shadow-lg overflow-hidden bg-white dark:bg-dark-bg-secondary">
                    <div class="bg-gray-200 dark:bg-gray-700 px-4 py-3 font-bold">Placeholder Widget</div>
                    <div class="p-4">
                        <p class="text-gray-600 dark:text-gray-300">This is a placeholder widget. You can add any content here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</x-layout>
