@props(['item'])

<li class="relative group">
    @php
        $active = request()->url() === $item->url;
    @endphp
    <a href="{{ $item->url }}" class="hover:underline text-white px-3 py-2 rounded-md text-sm font-medium {{ $active ? 'text-purple-500' : '' }}">
        {{ $item->label }}
    </a>

    @if ($item->children->count())
        <ul class="absolute hidden group-hover:block bg-gray-900 text-white shadow-lg z-10 rounded-md mt-2 min-w-[10rem]">
            @foreach ($item->children as $child)
                <x-menu-item :item="$child" />
            @endforeach
        </ul>
    @endif
</li>
