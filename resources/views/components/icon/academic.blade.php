@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'mr-3 flex-shrink-0 h-6 w-6 text-indigo-500 transition'
                : 'mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500 transition';
@endphp

<svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => $classes]) }} fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path d="M12 14l9-5-9-5-9 5 9 5z" />
    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
</svg>
