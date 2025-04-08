@props([
  'colours' => [
    'success' => 'bg-green-100 border-green-400 text-green-700',
    'error' => 'bg-red-100 border-red-400 text-red-700',
    'warning' => 'bg-orange-100 border-orange-400 text-orange-700',
    'info' => 'bg-blue-100 border-blue-400 text-blue-700'
  ]
])

@php
  $type = collect(['success', 'error', 'warning', 'info'])->first(fn($t) => session()->has($t));
  $message = $type ? session($type) : null;
@endphp

@if ($message)
    <div {{ $attributes->merge(['class' => "{$colours[$type]} border-l-4 px-4 py-3 relative mb-4"]) }}>
        <div class="flex justify-between">
            {{ $message }}
            <button type="button" onclick="this.parentElement.style.display='none';">
                &times;
            </button>
        </div>
    </div>
@endif
