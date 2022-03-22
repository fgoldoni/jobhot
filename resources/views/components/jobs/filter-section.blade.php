
<form {{ $attributes }}>

    <h3 class="sr-only">Categories</h3>

    <ul role="list" class="text-sm font-medium text-gray-900 space-y-4 pb-6 border-b border-gray-200">
        <li>
            @include('components.jobs.includes.upload-resume-button')
        </li>

        <li>
            @include('components.jobs.includes.save-job-alert-button')
        </li>
    </ul>

    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">

        <h3 class="-my-3 flow-root">

            <button

                @click="open = !open"

                type="button"

                class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500"

                aria-controls="filter-section-0"

                aria-expanded="false">

                <span class="font-medium text-gray-900"> Jobs By Countries </span>

                <span class="ml-6 flex items-center">

                    <svg x-show="!(open)" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>

                    <svg x-show="open" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>

                </span>
            </button>
        </h3>

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

                @livewire('jobs.filters-countries-component', key('filters-countries-component'))

            </div>

        </div>

    </div>

    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">

        <h3 class="-my-3 flow-root">

            <button

                @click="open = !open"

                type="button"

                class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500"

                aria-controls="filter-section-0"

                aria-expanded="false">

                <span class="font-medium text-gray-900"> Jobs By Divisions </span>

                <span class="ml-6 flex items-center">

                    <svg x-show="!(open)" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>

                    <svg x-show="open" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>

               </span>

            </button>
        </h3>

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

                @livewire('jobs.filters-divisions-component', key('filters-divisions-component'))

            </div>

        </div>

    </div>

    <div x-data="{ open: false }" class="border-b border-gray-200 py-6">

        <h3 class="-my-3 flow-root">

            <button

                @click="open = !open"

                type="button"

                class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500"

                aria-controls="filter-section-0"

                aria-expanded="false">

                <span class="font-medium text-gray-900"> Jobs By Cities </span>

                <span class="ml-6 flex items-center">

                    <svg x-show="!(open)" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>

                    <svg x-show="open" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>

                </span>
            </button>

        </h3>


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

                @livewire('jobs.filters-cities-component', key('filters-cities-component'))

            </div>

        </div>

    </div>

</form>
