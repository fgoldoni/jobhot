@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'mr-3 flex-shrink-0 h-6 w-6 text-indigo-500 transition'
                : 'mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500 transition';
@endphp


<svg {{ $attributes->merge(['class' => $classes]) }} xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
</svg>
