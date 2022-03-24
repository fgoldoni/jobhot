@props(['filters', 'city'])

@php
    $c = \Modules\Countries\Entities\City::find($city);

     $filters['cities'] = array_filter($filters['cities'], static function ($element) use ($city) {
         return $element != $city;
     });

@endphp

<span class="m-1 inline-flex rounded-full border border-gray-200 items-center py-1.5 pl-3 pr-2 text-sm font-medium bg-gray-100 text-gray-900">

        <span>{{ $c->name }}</span>

        <button type="button" class="flex-shrink-0 ml-1 h-4 w-4 p-1 rounded-full inline-flex text-gray-400 hover:bg-gray-200 hover:text-gray-500" wire:click="filtersChangeCities({{ json_encode($filters['cities']) }})">
            <span class="sr-only">Remove filter for Objects</span>
            <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
              <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
            </svg>
        </button>

    </span>

