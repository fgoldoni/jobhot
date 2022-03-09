@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'mr-3 flex-shrink-0 h-6 w-6 text-indigo-500 transition'
                : 'mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500 transition';
@endphp

<svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => $classes]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
</svg>
