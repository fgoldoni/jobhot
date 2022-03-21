@props(['countries', 'cities'])

<form class="hidden bg-white p-5 lg:block">
    <h3 class="sr-only">Categories</h3>
    <ul role="list" class="text-sm font-medium text-gray-900 space-y-4 pb-6 border-b border-gray-200">
        <li>
            <a href="#"> Totes </a>
        </li>

        <li>
            <a href="#"> Backpacks </a>
        </li>

        <li>
            <a href="#"> Travel Bags </a>
        </li>

        <li>
            <a href="#"> Hip Bags </a>
        </li>

        <li>
            <a href="#"> Laptop Sleeves </a>
        </li>
    </ul>

    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
        <h3 class="-my-3 flow-root">
            <!-- Expand/collapse section button -->
            <button
                @click="open = !open"
                type="button" class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                <span class="font-medium text-gray-900"> Jobs By Country </span>
                <span class="ml-6 flex items-center">
                    <!--
                      Expand icon, show/hide based on section open state.

                      Heroicon name: solid/plus-sm
                    -->
                    <svg x-show="!(open)" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    <!--
                      Collapse icon, show/hide based on section open state.

                      Heroicon name: solid/minus-sm
                    -->
                    <svg x-show="open" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                  </span>
            </button>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <div x-show="open"
             x-cloak
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="pt-6" id="filter-section-0">
            <div class="space-y-4">
                @foreach($countries as $country)
                    <div class="hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 cursor-pointer">
                        <input id="filter-countries-{{ $country->id }}" wire:model="filters.countries" value="{{ $country->id }}" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-countries-{{ $country->id }}" class="flex-1 ml-3 text-sm text-gray-600"> {{ $country->name }}  </label>
                        <span class="bg-gray-100 group-hover:bg-gray-200 ml-3 inline-block py-0.5 px-3 text-xs font-medium rounded-full"> {{ $country->jobs_count }} </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
        <h3 class="-my-3 flow-root">
            <!-- Expand/collapse section button -->
            <button
                @click="open = !open"
                type="button" class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                <span class="font-medium text-gray-900"> Jobs By Cities </span>
                <span class="ml-6 flex items-center">
                    <!--
                      Expand icon, show/hide based on section open state.

                      Heroicon name: solid/plus-sm
                    -->
                    <svg x-show="!(open)" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    <!--
                      Collapse icon, show/hide based on section open state.

                      Heroicon name: solid/minus-sm
                    -->
                    <svg x-show="open" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                  </span>
            </button>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <div x-show="open"
             x-cloak
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="pt-6" id="filter-section-0">
            <div class="space-y-4">
                @foreach($cities as $row)
                    <div class="hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 cursor-pointer">
                        <input id="filter-cities-{{ $row->city_id }}" wire:model="filters.cities" value="{{ $row->city_id }}" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-cities-{{ $row->city_id }}" class="flex-1 ml-3 text-sm text-gray-600"> {{ $row->city->name }}  </label>
                        <span class="bg-gray-100 group-hover:bg-gray-200 ml-3 inline-block py-0.5 px-3 text-xs font-medium rounded-full"> {{ $row->count }} </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">
        <h3 class="-my-3 flow-root">
            <!-- Expand/collapse section button -->
            <button
                @click="open = !open"
                type="button" class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">
                <span class="font-medium text-gray-900"> Jobs By Country </span>
                <span class="ml-6 flex items-center">
                    <!--
                      Expand icon, show/hide based on section open state.

                      Heroicon name: solid/plus-sm
                    -->
                    <svg x-show="!(open)" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    <!--
                      Collapse icon, show/hide based on section open state.

                      Heroicon name: solid/minus-sm
                    -->
                    <svg x-show="open" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                  </span>
            </button>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <div x-show="open"
             x-cloak
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="pt-6" id="filter-section-0">
            <div class="space-y-4">
                @foreach($countries as $country)
                    <div class="hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 cursor-pointer">
                        <input id="filter-color-{{ $country->id }}" name="color[]" value="white" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                        <label for="filter-color-{{ $country->id }}" class="flex-1 ml-3 text-sm text-gray-600"> {{ $country->name }}  </label>
                        <span class="bg-gray-100 group-hover:bg-gray-200 ml-3 inline-block py-0.5 px-3 text-xs font-medium rounded-full"> {{ $country->jobs_count }} </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</form>
