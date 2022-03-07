@props(['type'])


@switch($type)
    @case('folder')
        <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => 'flex-shrink-0 transition']) }} viewBox="0 0 20 20" fill="currentColor">
            <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
        </svg>
    @break

    @default
    <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => 'flex-shrink-0 transition']) }} viewBox="0 0 20 20" fill="currentColor">
        <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
    </svg>
@endswitch


