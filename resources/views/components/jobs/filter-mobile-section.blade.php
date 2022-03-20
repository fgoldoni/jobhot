<div
    x-show="open"
    x-cloak
    class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
    <!--
      Off-canvas menu overlay, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="open = false"

        class="fixed inset-0 bg-black bg-opacity-25"
        aria-hidden="true"></div>

    <!--
      Off-canvas menu, show/hide based on off-canvas menu state.

      Entering: "transition ease-in-out duration-300 transform"
        From: "translate-x-full"
        To: "translate-x-0"
      Leaving: "transition ease-in-out duration-300 transform"
        From: "translate-x-0"
        To: "translate-x-full"
    -->
    <div
        x-show="open"
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
                @click="open = false"
                type="button" class="-mr-2 w-10 h-10 bg-white p-2 rounded-md flex items-center justify-center text-gray-400">
                <span class="sr-only">Close menu</span>
                <!-- Heroicon name: outline/x -->
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
                    <a href="#" class="block px-2 py-3"> Totes </a>
                </li>

                <li>
                    <a href="#" class="block px-2 py-3"> Backpacks </a>
                </li>

                <li>
                    <a href="#" class="block px-2 py-3"> Travel Bags </a>
                </li>

                <li>
                    <a href="#" class="block px-2 py-3"> Hip Bags </a>
                </li>

                <li>
                    <a href="#" class="block px-2 py-3"> Laptop Sleeves </a>
                </li>
            </ul>

            <div
                x-data="{ open: false }"
                class="border-t border-gray-200 px-4 py-6">
                <h3 class="-mx-2 -my-3 flow-root">
                    <!-- Expand/collapse section button -->
                    <button @click="open = !open" type="button" class="px-2 py-3 bg-white w-full flex items-center justify-between text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-0" aria-expanded="false">
                        <span class="font-medium text-gray-900"> Color </span>
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
                  <svg x-show="open" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                  </svg>
                </span>
                    </button>
                </h3>
                <!-- Filter section, show/hide based on section state. -->
                <div
                    x-show="open"
                    class="pt-6" id="filter-section-mobile-0">
                    <div class="space-y-6">
                        <div class="flex items-center">
                            <input id="filter-mobile-color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500"> White </label>
                        </div>

                        <div class="flex items-center">
                            <input id="filter-mobile-color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-1" class="ml-3 min-w-0 flex-1 text-gray-500"> Beige </label>
                        </div>

                        <div class="flex items-center">
                            <input id="filter-mobile-color-2" name="color[]" value="blue" type="checkbox" checked class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500"> Blue </label>
                        </div>

                        <div class="flex items-center">
                            <input id="filter-mobile-color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500"> Brown </label>
                        </div>

                        <div class="flex items-center">
                            <input id="filter-mobile-color-4" name="color[]" value="green" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-4" class="ml-3 min-w-0 flex-1 text-gray-500"> Green </label>
                        </div>

                        <div class="flex items-center">
                            <input id="filter-mobile-color-5" name="color[]" value="purple" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                            <label for="filter-mobile-color-5" class="ml-3 min-w-0 flex-1 text-gray-500"> Purple </label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
