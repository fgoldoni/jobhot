@props(['rows'])

<section aria-labelledby="filter-heading">
    <h2 id="filter-heading" class="sr-only">Filters</h2>

    <div x-data="{ openFilters: false }" aria-labelledby="filter-heading" class="relative z-10 border-t border-b border-gray-200 grid items-center">
        <h2 id="filter-heading" class="sr-only">Filters</h2>
        <div class="relative col-start-1 row-start-1 py-4">
            <div class="max-w-7xl mx-auto flex space-x-6 divide-x divide-gray-200 text-sm">
                <div>
                    <button
                        @click="openFilters = !openFilters"
                        type="button" class="group text-gray-700 font-medium flex items-center" aria-controls="disclosure-1" aria-expanded="false">
                        <!-- Heroicon name: solid/filter -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-none w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                        </svg>
                        2 Filters
                    </button>
                </div>
                <div class="pl-6">
                    <span class="text-gray-400 text-xs">About {{ $rows->total() }} results ... </span>
                    <x-button.link>Clear all</x-button.link>
                </div>
            </div>
        </div>
        <div
            x-show="openFilters"
            x-cloak
            class="border-t border-gray-200 py-10" id="disclosure-1">
            <div class="max-w-7xl mx-auto grid grid-cols-2 gap-x-4 px-4 text-sm sm:px-6 md:gap-x-6 lg:px-8">
                <div class="grid grid-cols-1 gap-y-10 auto-rows-min md:grid-cols-2 md:gap-x-6">
                    <fieldset>
                        <legend class="block font-medium">Price</legend>
                        <div class="pt-6 space-y-6 sm:pt-4 sm:space-y-4">
                            <div class="flex items-center text-base sm:text-sm">
                                <input id="price-0" name="price[]" value="0" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="price-0" class="ml-3 min-w-0 flex-1 text-gray-600"> $0 - $25 </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="price-1" name="price[]" value="25" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="price-1" class="ml-3 min-w-0 flex-1 text-gray-600"> $25 - $50 </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="price-2" name="price[]" value="50" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="price-2" class="ml-3 min-w-0 flex-1 text-gray-600"> $50 - $75 </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="price-3" name="price[]" value="75" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="price-3" class="ml-3 min-w-0 flex-1 text-gray-600"> $75+ </label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="block font-medium">Color</legend>
                        <div class="pt-6 space-y-6 sm:pt-4 sm:space-y-4">
                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-0" name="color[]" value="white" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="color-0" class="ml-3 min-w-0 flex-1 text-gray-600"> White </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-1" name="color[]" value="beige" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="color-1" class="ml-3 min-w-0 flex-1 text-gray-600"> Beige </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-2" name="color[]" value="blue" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500" checked>
                                <label for="color-2" class="ml-3 min-w-0 flex-1 text-gray-600"> Blue </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-3" name="color[]" value="brown" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="color-3" class="ml-3 min-w-0 flex-1 text-gray-600"> Brown </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-4" name="color[]" value="green" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="color-4" class="ml-3 min-w-0 flex-1 text-gray-600"> Green </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="color-5" name="color[]" value="purple" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="color-5" class="ml-3 min-w-0 flex-1 text-gray-600"> Purple </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="grid grid-cols-1 gap-y-10 auto-rows-min md:grid-cols-2 md:gap-x-6">
                    <fieldset>
                        <legend class="block font-medium">Size</legend>
                        <div class="pt-6 space-y-6 sm:pt-4 sm:space-y-4">
                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-0" name="size[]" value="xs" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="size-0" class="ml-3 min-w-0 flex-1 text-gray-600"> XS </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-1" name="size[]" value="s" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500" checked>
                                <label for="size-1" class="ml-3 min-w-0 flex-1 text-gray-600"> S </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-2" name="size[]" value="m" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="size-2" class="ml-3 min-w-0 flex-1 text-gray-600"> M </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-3" name="size[]" value="l" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="size-3" class="ml-3 min-w-0 flex-1 text-gray-600"> L </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-4" name="size[]" value="xl" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="size-4" class="ml-3 min-w-0 flex-1 text-gray-600"> XL </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="size-5" name="size[]" value="2xl" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="size-5" class="ml-3 min-w-0 flex-1 text-gray-600"> 2XL </label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="block font-medium">Category</legend>
                        <div class="pt-6 space-y-6 sm:pt-4 sm:space-y-4">
                            <div class="flex items-center text-base sm:text-sm">
                                <input id="category-0" name="category[]" value="all-new-arrivals" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="category-0" class="ml-3 min-w-0 flex-1 text-gray-600"> All New Arrivals </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="category-1" name="category[]" value="tees" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="category-1" class="ml-3 min-w-0 flex-1 text-gray-600"> Tees </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="category-2" name="category[]" value="objects" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="category-2" class="ml-3 min-w-0 flex-1 text-gray-600"> Objects </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="category-3" name="category[]" value="sweatshirts" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="category-3" class="ml-3 min-w-0 flex-1 text-gray-600"> Sweatshirts </label>
                            </div>

                            <div class="flex items-center text-base sm:text-sm">
                                <input id="category-4" name="category[]" value="pants-and-shorts" type="checkbox" class="flex-shrink-0 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                <label for="category-4" class="ml-3 min-w-0 flex-1 text-gray-600"> Pants &amp; Shorts </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="col-start-1 row-start-1 py-4">
            <div class="flex items-center justify-end max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative inline-block text-left">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" id="menu-button" aria-expanded="false" aria-haspopup="true">
                                Sort
                                <!-- Heroicon name: solid/chevron-down -->
                                <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link class="font-medium text-gray-900" href="{{ route('admin.users') }}">
                                {{ __('Most Popular') }}
                            </x-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <x-dropdown-link href="javascript:;" wire:click="$set('filters.days', 1)">
                                {{ __('Today') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="javascript:;" wire:click="$set('filters.days', 2)">
                                {{ __('Yesterday') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="javascript:;" wire:click="$set('filters.days', 7)">
                                {{ __('Last 7 Days') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="javascript:;" wire:click="$set('filters.days', 3)">
                                {{ __('Last 30 Days') }}
                            </x-dropdown-link>

                        </x-slot>
                    </x-dropdown>
                </div>
                <div class="relative inline-block text-left mt-3">
                    <button
                        @click="open = true"
                        type="button" class="p-2 -m-2 ml-4 sm:ml-6 text-gray-400 hover:text-gray-500 lg:hidden">
                        <span class="sr-only">Filters</span>
                        <!-- Heroicon name: solid/filter -->
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Active filters -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-3 px-4 sm:flex sm:items-center sm:px-6 lg:px-8">
            <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                Filters
                <span class="sr-only">, active</span>
            </h3>

            <div aria-hidden="true" class="hidden w-px h-5 bg-gray-300 sm:block sm:ml-4"></div>

            <div class="mt-2 sm:mt-0 sm:ml-4">
                <div class="-m-1 flex flex-wrap items-center">
                    <div wire:loading>
                        <button type="button" class="inline-flex items-center px-4 py-2 border-0 font-semibold leading-6 text-sm text-gray-900 transition ease-in-out duration-150 cursor-not-allowed" disabled="">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Processing...
                        </button>
                    </div>
                    <span wire:loading.remove class="m-1 inline-flex rounded-full border border-gray-200 items-center py-1.5 pl-3 pr-2 text-sm font-medium bg-gray-100 text-gray-900">
                        <span>Objects</span>
                        <button type="button" class="flex-shrink-0 ml-1 h-4 w-4 p-1 rounded-full inline-flex text-gray-400 hover:bg-gray-200 hover:text-gray-500">
                            <span class="sr-only">Remove filter for Objects</span>
                            <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                              <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                            </svg>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
