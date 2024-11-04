<!-- resources/views/livewire/admin/breadcrumbs.blade.php -->
<nav class="text-sm text-gray-600 dark:text-gray-400 mb-4">
    <ol class="flex space-x-2">
        @foreach($breadcrumbs as $breadcrumb)
            <li class="flex items-center">
                <a href="{{ route($breadcrumb['route']) }}" class="hover:underline text-blue-500 dark:text-blue-400">
                    {{ $breadcrumb['title'] }}
                </a>
                @if (!$loop->last)
                    <span class="mx-2">/</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>