@props(['rows', 'areas', 'industries', 'filters', 'countries'])

@php

    $filtersCount =0;

    foreach ($filters as $filter)
    {
        $filtersCount += empty($filter) ? 0 : (is_array($filter) ? count($filter) : 1);
    }

@endphp

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

                        type="button"

                        class="group text-gray-700 font-medium flex items-center"

                        aria-controls="disclosure-1"

                        aria-expanded="false">

                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-none w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                        </svg>

                        Browse Jobs

                    </button>

                </div>

                <div class="pl-6">

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


                    <select id="tabs" name="tabs" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">

                        <option>My Account</option>

                        <option>Company</option>

                        <option selected>Team Members</option>

                        <option>Billing</option>

                    </select>

                </div>

                <div class="hidden sm:block">

                    <div class="border-b border-gray-100">

                        <nav  class="-mb-px flex space-x-8" aria-label="Tabs">
                            <a @click="toggleTab('tab1')"

                                href="#tab1"

                                :class="{'border-indigo-500 text-indigo-600' : isActive ('tab1'), 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' : !(isActive ('tab1'))}"

                                class="group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">

                                <svg

                                    :class="{'text-indigo-500' : isActive ('tab1'), 'text-gray-400 group-hover:text-gray-500 ' : !(isActive ('tab1'))}"

                                    class="-ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">

                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />

                                </svg>

                                <span>Areas</span>
                            </a>

                            <a
                                @click="toggleTab('tab2')"

                                href="#tab2"

                                :class="{'border-indigo-500 text-indigo-600' : isActive ('tab2'), 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' : !(isActive ('tab2'))}"

                                class="group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm">


                                <svg
                                    :class="{'text-indigo-500' : isActive ('tab2'), 'text-gray-400 group-hover:text-gray-500' : !(isActive ('tab2'))}"
                                    class="-ml-0.5 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                                </svg>

                                <span>Industries</span>
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

                <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-x-4 px-4 py-4 text-sm sm:px-6 md:gap-x-6 lg:px-8">

                    @foreach($areas->chunk(8) as $chunks)

                        @foreach($chunks->chunk(4) as $chunk)

                            <div class="grid grid-cols-1 gap-y-10 py-4 auto-rows-min md:gap-x-6" wire:key="chunk-{{ $loop->index }}">

                                <fieldset>

                                    <div class="space-y-6 sm:space-y-4">

                                        @foreach($chunk as $area)

                                            @php
                                                $isSelected = in_array($area->id, $filters['categories']);
                                            @endphp

                                            <input x-model="selected" id="area-{{ $area->id }}" value="{{ $area->id }}" type="checkbox" class="hidden">

                                            <label  for="area-{{ $area->id }}">


                                                <div class="{{ $isSelected ? 'bg-gray-100 text-gray-900 ' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 '}} group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                                                    <x-icon.solid type="{{ $area->icon }}" class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" x-ignore/>

                                                    <span class="flex flex-1 inline-block">

                                                        {{ $area->name }}

                                                        @if($isSelected)
                                                            <svg class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                        @endif

                                                    </span>

                                                    @if($area->jobs_count)

                                                        <span class="{{ $isSelected ? 'bg-white ' : 'bg-gray-100 group-hover:bg-gray-200 '}} ml-3 inline-block py-0.5 px-3 text-xs font-medium rounded-full">
                                                            {{ $area->jobs_count }}
                                                        </span>

                                                    @endif
                                                </div>

                                            </label>

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
                                {{ __('Last 2 Days') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="javascript:;" wire:click="$set('filters.days', 7)">
                                {{ __('Last 7 Days') }}
                            </x-dropdown-link>

                            <x-dropdown-link href="javascript:;" wire:click="$set('filters.days', 30)">
                                {{ __('Last 30 Days') }}
                            </x-dropdown-link>

                        </x-slot>

                    </x-dropdown>

                </div>

                <div class="relative inline-block text-left mt-3">

                    <button

                        @click="openSidebar = true"

                        type="button" class="p-2 -m-2 ml-4 sm:ml-6 text-gray-400 hover:text-gray-500 lg:hidden">

                        <span class="sr-only">Filters</span>


                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                        </svg>

                    </button>

                </div>

            </div>

        </div>

    </div>


    <div class="bg-white">

        <div class="max-w-7xl mx-auto py-3 px-4 sm:flex sm:items-center sm:px-6 lg:px-8">

            <h3 class="relative inline-block text-xs font-semibold uppercase tracking-wide text-gray-500">
                Filters
                <span class="sr-only">, active</span>

                @if($filtersCount)
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">
                        {{ $filtersCount }}
                    </span>
                @endif
            </h3>

            <div aria-hidden="true" class="hidden w-px h-5 bg-gray-300 sm:block sm:ml-4"></div>

            <div class="mt-2 sm:mt-0 sm:ml-4">

                <div class="-m-1 flex flex-wrap items-center">

                    <x-jobs.filters.days :filters="$filters"></x-jobs.filters.days>

                    @foreach ($filters['countries'] as $country)

                        <x-jobs.filters.countries :filters="$filters" :country="$country"></x-jobs.filters.countries>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>
