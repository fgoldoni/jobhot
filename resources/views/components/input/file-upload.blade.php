@props([
    'error' => false,
])

<div class="mt-1 sm:mt-0 sm:col-span-2">
    <div class="flex items-center" x-data="{ focused: false }">
          <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
            {{ $slot }}
          </span>
          <input @focus="focused = true" @blur="focused = false" class="sr-only" type="file" {{ $attributes }}>
          <label
              for="{{ $attributes['id'] }}"
              :class="{ 'outline-none border-blue-300 shadow-outline-blue': focused }"
              class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Change
          </label>
    </div>
     @if ($error)
        <p class="mt-2 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>
