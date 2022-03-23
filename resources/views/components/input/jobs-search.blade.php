@props(['items'])

<div
    class="relative"

    x-data="{

      open: @entangle('showJobDropdown'),

      searchJob: @entangle('searchJob'),

      selected: @entangle('selectedJob'),

      highlightedIndex: 0,

      highlightPrevious() {
        if (this.highlightedIndex > 0) {
          this.highlightedIndex = this.highlightedIndex - 1;
          this.scrollIntoView();
        }
      },

      highlightNext() {
        if (this.highlightedIndex < this.$refs.results.children.length - 1) {
          this.highlightedIndex = this.highlightedIndex + 1;
          this.scrollIntoView();
        }
      },

      scrollIntoView() {
        this.$refs.results.children[this.highlightedIndex].scrollIntoView({
          block: 'nearest',
          behavior: 'smooth'
        });
      },

      onEscape() {
       this.open = false,
         this.$refs.input.focus()
      },

      updateSelected(id, name) {
        this.selected = id;
        this.searchJob = name;
        this.open = false;
        this.highlightedIndex = 0;
      },

     }"

    @value-selected.window="updateSelected($event.detail.id, $event.detail.name)">

    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <!-- Heroicon name: solid/search -->
        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
        </svg>
    </div>

    <input

        wire:model.debounce.300ms="searchJob"

        @keydown.arrow-down.stop.prevent="highlightNext()"

        @keydown.arrow-up.stop.prevent="highlightPrevious()"

        @keydown.escape="onEscape()"

        @keydown.enter.stop.prevent="$dispatch('value-selected', {
             id: escape($refs.results.children[highlightedIndex].getAttribute('data-result-id')),
            name: escape($refs.results.children[highlightedIndex].getAttribute('data-result-name'))
        })"

        x-ref="input"

        type="text"


        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"


        placeholder="Search jobs, location, companies, keywords">

    <ul
        x-ref="results"

        x-show="open"

        x-cloak

        @click.away="open = false"

        x-transition:leave="transition ease-in duration-150"

        x-transition:leave-start="opacity-100"

        x-transition:leave-end="opacity-0"

        class="absolute w-full max-h-96 z-20 scroll-pt-11 scroll-pb-2 space-y-2 overflow-y-auto pb-2 bg-white"

        id="options"

        role="listbox">

        @forelse($items as $index => $item)
            <li
                wire:key="{{ $index }}"

                @mouseenter="highlightedIndex = {{ $index }}"

                @mouseleave="highlightedIndex = null"

                :class="{ 'bg-gray-100': highlightedIndex === {{ $index }}, '': !(highlightedIndex === {{ $index }}) }"

                data-result-id="{{ $item->id }}"

                data-result-name="{{ addslashes($item->name) }}"

                @click.stop="$dispatch('value-selected', {
                                    id: {{ $item->id }},
                                    name: '{{ addslashes($item->name) }}'
                                })"

                class="group flex cursor-default select-none rounded-xl p-3"

                id="listbox-option-{{ $item->id }}"

                role="option"

                tabindex="-1">

                <img class="flex flex-none h-10 w-10 rounded-full" src="{{ $item->avatar_url }}" alt="{{ $item->name }}">
                <div class="ml-4 flex-auto">
                    <!-- Active: "text-gray-900", Not Active: "text-gray-700" -->
                    <p
                        :class="{ 'text-indigo-900': highlightedIndex === {{ $index }}, 'text-indigo-700': !(highlightedIndex === {{ $index }}) }"
                        class="text-sm font-medium">
                        {{ $item->name }}

                    </p>
                    <!-- Active: "text-gray-700", Not Active: "text-gray-500" -->
                    <p
                        :class="{ 'text-gray-700': highlightedIndex === {{ $index }}, 'text-gray-500': !(highlightedIndex === {{ $index }}) }"
                        class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="ml-1">
                            {{ $item->city_id ? $item->city->name : $item->division->name }}, {{ $item->country->emoji }} {{ $item->country->name }}
                        </span>
                    </p>
                </div>
                <span class="ml-3 flex-none text-xs font-semibold text-gray-400">
                    {{ $item->live_at_formatted }}
                </span>
            </li>
        @empty

            <!-- Empty state, show/hide based on command palette state -->

            <div class="border-t border-gray-100 py-6 px-6 text-center text-sm sm:px-14 bg-white">
                <!-- Heroicon name: outline/emoji-sad -->
                <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="mt-4 font-semibold text-gray-900">No results found</p>
                <p class="mt-2 text-gray-500">We couldn’t find anything with that term. Please try again.</p>
            </div>

        @endforelse
    </ul>

</div>
