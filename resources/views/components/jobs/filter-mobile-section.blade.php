<div
    x-show="openSidebar"

    x-cloak

    class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">

    <div

        x-show="openSidebar"

        x-cloak

        x-transition:enter="transition-opacity ease-linear duration-300"

        x-transition:enter-start="opacity-0"

        x-transition:enter-end="opacity-100"

        x-transition:leave="transition-opacity ease-linear duration-300"

        x-transition:leave-start="opacity-100"

        x-transition:leave-end="opacity-0"

        @click="openSidebar = false"

        class="fixed inset-0 bg-black bg-opacity-25"

        aria-hidden="true">

    </div>

    <div
        x-show="openSidebar"

        x-transition:enter="transition ease-in-out duration-300 transform"

        x-transition:enter-start="translate-x-full"

        x-transition:enter-end="translate-x-0"

        x-transition:leave="transition ease-in-out duration-300 transform"

        x-transition:enter="transition ease-in-out duration-300 transform"

        x-transition:leave-start="translate-x-0"

        x-transition:leave-end="translate-x-full"

        class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-12 flex flex-col overflow-y-auto">

        <div class="px-4 flex items-center justify-between">

            <h2 class="text-lg font-medium text-gray-900">Filters</h2>

            <button

                @click="openSidebar = false"

                type="button" class="-mr-2 w-10 h-10 bg-white p-2 rounded-md flex items-center justify-center text-gray-400">

                <span class="sr-only">Close menu</span>

                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </button>

        </div>

        <!-- Filters -->
        <form class="mt-4 border-t border-gray-200">

            <h3 class="sr-only">Categories</h3>

            <ul role="list" class="font-medium text-gray-900 px-2 py-3">

                <li>
                    @include('components.jobs.includes.upload-resume-button')
                </li>

                <li>
                    @include('components.jobs.includes.save-job-alert-button')
                </li>

            </ul>

            <div

                x-data="{ openSidebar: false }"

                class="border-t border-gray-200 px-4 py-6">

                <h3 class="-mx-2 -my-3 flow-root">

                    <!-- Expand/collapse section button -->
                    <button

                        @click="openSidebar = !openSidebar"

                        type="button" class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500"

                        aria-controls="filter-section-0"

                        aria-expanded="false">

                        <span class="font-medium text-gray-900"> Jobs By Countries </span>

                        <span class="ml-6 flex items-center">

                            <svg x-show="!(openSidebar)" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>

                            <svg x-show="openSidebar" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>

                      </span>
                    </button>

                </h3>

                <!-- Filter section, show/hide based on section state. -->
                <div
                    x-show="openSidebar"

                     x-cloak

                     x-transition:enter="transition-opacity ease-linear duration-300"

                     x-transition:enter-start="opacity-0"

                     x-transition:enter-end="opacity-100"

                     x-transition:leave="transition-opacity ease-linear duration-300"

                     x-transition:leave-start="opacity-100"

                     x-transition:leave-end="opacity-0"

                     class="pt-6" id="filter-section-0">

                    <div class="space-y-4">

                        @livewire('jobs.filters-countries-component', key('filters-mobile-countries-component'))

                    </div>

                </div>

            </div>

            <div x-data="{ openSidebar: false }" class="border-t border-gray-200 px-4 py-6">

                <h3 class="-mx-2 -my-3 flow-root">

                    <!-- Expand/collapse section button -->
                    <button

                        @click="openSidebar = !openSidebar"

                        type="button" class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500" aria-controls="filter-section-0" aria-expanded="false">

                        <span class="font-medium text-gray-900"> Jobs By Divisions </span>

                        <span class="ml-6 flex items-center">

                            <svg x-show="!(openSidebar)" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>

                            <svg x-show="openSidebar" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>

                      </span>

                    </button>
                </h3>

                <!-- Filter section, show/hide based on section state. -->
                <div x-show="openSidebar"

                     x-cloak

                     x-transition:enter="transition-opacity ease-linear duration-300"

                     x-transition:enter-start="opacity-0"

                     x-transition:enter-end="opacity-100"

                     x-transition:leave="transition-opacity ease-linear duration-300"

                     x-transition:leave-start="opacity-100"

                     x-transition:leave-end="opacity-0"

                     class="pt-6" id="filter-section-0">

                    <div class="space-y-4">
                        @livewire('jobs.filters-divisions-component', key('filters-mobile-divisions-component'))
                    </div>

                </div>
            </div>

            <div x-data="{ openSidebar: false }" class="border-t border-gray-200 px-4 py-6">

                <h3 class="-mx-2 -my-3 flow-root">

                    <!-- Expand/collapse section button -->
                    <button

                        @click="openSidebar = !openSidebar"

                        type="button"

                        class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500"

                        aria-controls="filter-section-0" aria-expanded="false">

                        <span class="font-medium text-gray-900"> Jobs By Cities </span>

                        <span class="ml-6 flex items-center">

                            <svg x-show="!(openSidebar)" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>

                            <svg x-show="openSidebar" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>

                       </span>
                    </button>

                </h3>

                <!-- Filter section, show/hide based on section state. -->
                <div x-show="openSidebar"

                     x-cloak

                     x-transition:enter="transition-opacity ease-linear duration-300"

                     x-transition:enter-start="opacity-0"

                     x-transition:enter-end="opacity-100"

                     x-transition:leave="transition-opacity ease-linear duration-300"

                     x-transition:leave-start="opacity-100"

                     x-transition:leave-end="opacity-0"

                     class="pt-6" id="filter-section-0">

                    <div class="space-y-4">
                        @livewire('jobs.filters-cities-component', key('filters-mobile-cities-component'))
                    </div>

                </div>
            </div>

        </form>
    </div>
</div>

