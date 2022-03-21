@props(['rows', 'areas', 'industries', 'filters'])

<section aria-labelledby="filter-heading">
    <h2 id="filter-heading" class="sr-only">Filters</h2>

    <div
        x-data="{ openFilters: false }"

        aria-labelledby="filter-heading"

        class="relative z-10 border-t border-b border-gray-200 grid items-center">

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
                    <x-button.link wire:click="resetFilters">Clear all</x-button.link>
                </div>
            </div>
        </div>
        <div

            x-show="openFilters"

            x-transition:enter="transition-opacity ease-linear duration-300"

            x-transition:enter-start="opacity-0"

            x-transition:enter-end="opacity-100"

            x-transition:leave="transition-opacity ease-linear duration-300"

            x-transition:leave-start="opacity-100"

            x-transition:leave-end="opacity-0"

            x-cloak

            x-data="{
                tab: 'tab1',
                selected:  @entangle($attributes->wire('model')),
                toggleTab (tab) {
                    this.tab = tab;
                },
                isActive (tab) {
                    return this.tab === tab;
                },
                choice (id) {
                    this.selected = id;
                }
            }"

            class="border-t border-gray-200 bg-gray-200"
            id="disclosure-1">

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
                        <nav
                            class="-mb-px flex space-x-8" aria-label="Tabs">
                            <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                            <a
                                @click="toggleTab('tab1')"

                                href="#tab1"

                                :class="{'border-indigo-500 text-indigo-600' : isActive ('tab1'), 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' : !(isActive ('tab1'))}"

                                class="group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">

                                <svg
                                    :class="{'text-indigo-500' : isActive ('tab1'), 'text-gray-400 group-hover:text-gray-500 ' : !(isActive ('tab1'))}"
                                    class="-ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                                </svg>

                                <span>Areas</span>

                                <!-- Current: "bg-indigo-100 text-indigo-600", Default: "bg-gray-100 text-gray-900" -->
                                <span
                                    :class="{'bg-indigo-100 text-indigo-600' : isActive ('tab1'), 'bg-gray-100 text-gray-900' : !(isActive ('tab1'))}"
                                    class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{ $areas->count() }}
                                </span>
                            </a>

                            <a
                                @click="toggleTab('tab2')"

                                href="#tab2"

                                :class="{'border-indigo-500 text-indigo-600' : isActive ('tab2'), 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' : !(isActive ('tab2'))}"

                                class="group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">

                                <!-- Heroicon name: solid/office-building -->
                                <svg
                                    :class="{'text-indigo-500' : isActive ('tab2'), 'text-gray-400 group-hover:text-gray-500' : !(isActive ('tab2'))}"
                                    class="-ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                                </svg>

                                <span>Industries</span>

                                <span
                                    :class="{'bg-indigo-100 text-indigo-600' : isActive ('tab2'), 'bg-gray-100 text-gray-900' : !(isActive ('tab2'))}"
                                    class="hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{ $industries->count() }}
                                </span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <template
                x-if="isActive('tab1')"
                x-cloak
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full">
                <div class="max-w-7xl mx-auto grid grid-cols-2 gap-x-4 px-4 py-4 text-sm sm:px-6 md:gap-x-6 lg:px-8">
                    @foreach($areas->chunk(8) as $chunks)
                        @foreach($chunks->chunk(4) as $chunk)
                            <div class="grid grid-cols-1 gap-y-10 py-4 auto-rows-min md:gap-x-6" wire:key="chunk-{{ $loop->index }}">
                                <fieldset>
                                    <div class="space-y-6 sm:space-y-4">
                                        @foreach($chunk as $area)
                                            <div wire:key="area-{{ $loop->index }}" x-on:click="choice({{ $area->id }})">
                                                <a href="javascript:;" class="flex items-center text-sm hover:underline">
                                                    @if($filters['category'] === $area->id)
                                                        <svg class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 transition mr-1.5 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                        </svg>
                                                    @endif
                                                    <span class="text-gray-500">
                                                        {{ $area->name }}
                                                        @if($area->jobs_count)
                                                            <span class="bg-indigo-100 text-indigo-600 ml-1 py-0.5 px-2.5 rounded-full text-xs font-medium inline-block">
                                                              {{ $area->jobs_count }}
                                                            </span>
                                                        @endif
                                                    </span>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </template>

            <template
                x-if="isActive('tab2')"
                x-cloak
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full">
                <div class="max-w-7xl mx-auto grid grid-cols-2 gap-x-4 px-4 py-4 text-sm sm:px-6 md:gap-x-6 lg:px-8">
                    @foreach($industries->chunk(8) as $chunks)
                        <div class="grid grid-cols-1 gap-y-10 auto-rows-min md:grid-cols-2 md:gap-x-6">
                            @foreach($chunks->chunk(4) as $chunk)
                                <fieldset>
                                    <div class="space-y-6 sm:space-y-4">
                                        @foreach($chunk as $industry)
                                            <a href="javascript:;" class="flex items-center text-sm hover:underline">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 transition mr-1.5 h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                                </svg>
                                                <span class="text-gray-500">
                                                {{ $industry->name }}
                                            </span>
                                            </a>
                                        @endforeach
                                    </div>
                                </fieldset>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </template>

        </div>
        <div class="col-start-1 row-start-1 py-4">
            <div class="flex items-center justify-end max-w-7xl mx-auto">
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
