@props([
    'loading' => false,
    'loadingText' => 'Loading...',
    'variant' => 'primary'
])

<x-button :variant="$variant" :loading="$loading" {{ $attributes }}>
    @if($loading)
        {{ $loadingText }}
    @else
        {{ $slot }}
    @endif
</x-button>