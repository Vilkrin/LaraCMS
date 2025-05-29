@props([
    'variant' => 'primary',
    'size' => 'default',
    'disabled' => false,
    'type' => 'button'
])

@php
$baseClasses = 'inline-flex items-center justify-center font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors border disabled:opacity-50 disabled:cursor-not-allowed';

$variantClasses = [
    'primary' => 'border-blue-600 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 dark:text-blue-400 dark:border-blue-400 focus:ring-blue-500',
    'secondary' => 'border-gray-600 text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700/50 dark:text-gray-400 dark:border-gray-400 focus:ring-gray-500',
    'success' => 'border-green-600 text-green-600 hover:bg-green-50 dark:hover:bg-green-900/20 dark:text-green-400 dark:border-green-400 focus:ring-green-500',
    'danger' => 'border-red-600 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 dark:text-red-400 dark:border-red-400 focus:ring-red-500',
    'warning' => 'border-yellow-500 text-yellow-500 hover:bg-yellow-50 dark:hover:bg-yellow-900/20 dark:text-yellow-400 dark:border-yellow-400 focus:ring-yellow-500',
    'info' => 'border-indigo-600 text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 dark:text-indigo-400 dark:border-indigo-400 focus:ring-indigo-500',
];

$sizeClasses = [
    'xs' => 'px-2.5 py-1.5 text-xs',
    'sm' => 'px-3 py-1.5 text-sm',
    'default' => 'px-4 py-2 text-base',
    'lg' => 'px-5 py-2.5 text-lg',
    'xl' => 'px-6 py-3 text-xl',
];

$classes = $baseClasses . ' ' . $variantClasses[$variant] . ' ' . $sizeClasses[$size];
@endphp

<button
    {{ $attributes->merge(['type' => $type, 'class' => $classes]) }}
    @if($disabled) disabled @endif
>
    {{ $slot }}
</button>