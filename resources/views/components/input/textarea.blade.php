@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['rows' => 3, 'autocomplete' => 'off', 'class' => 'shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md']) !!}
>

</textarea>
