@props(['rows', 'areas'])

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
                        Browse Jobs
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
            class="border-t border-gray-200 bg-gray-200" id="disclosure-1">

            <div class="px-4 py-4 sm:px-6 lg:px-8">
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select a tab</label>
                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                    <select id="tabs" name="tabs" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        <option>My Account</option>

                        <option>Company</option>

                        <option selected>Team Members</option>

                        <option>Billing</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
                                <!--
                                  Heroicon name: solid/user

                                  Current: "text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500"
                                -->
                                <svg class="text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                <span>My Account</span>
                            </a>

                            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
                                <!-- Heroicon name: solid/office-building -->
                                <svg class="text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                                </svg>
                                <span>Company</span>
                            </a>

                            <a href="#" class="border-indigo-500 text-indigo-600 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                                <!-- Heroicon name: solid/users -->
                                <svg class="text-indigo-500 -ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                </svg>
                                <span>Team Members</span>
                            </a>

                            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">
                                <!-- Heroicon name: solid/credit-card -->
                                <svg class="text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                    <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                                </svg>
                                <span>Billing</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="max-w-7xl mx-auto grid grid-cols-2 gap-x-4 px-4 py-4 text-sm sm:px-6 md:gap-x-6 lg:px-8">
                @foreach($areas->chunk(8) as $chunks)
                    <div class="grid grid-cols-1 gap-y-10 auto-rows-min md:grid-cols-2 md:gap-x-6">
                        @foreach($chunks->chunk(4) as $chunk)
                            <fieldset>
                                <div class="space-y-6 sm:space-y-4">
                                    @foreach($chunk as $area)
                                        <a href="javascript:;" class="flex items-center text-sm hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 transition mr-1.5 h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                              <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                            </svg>
                                             <span class="text-gray-500">
                                                {{ $area->name }}
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            </fieldset>
                        @endforeach
                    </div>
                @endforeach
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
