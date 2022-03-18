@props(['items'])

<div
      class="relative w-full h-12 border-2 border-gray-200 rounded-lg lg:border-0 lg:w-auto lg:flex-1"

      x-data="{

      open: @entangle('showJobDropdown'),

      searchJob: @entangle('searchJob'),

      selected: @entangle('selectedJob'),

      highlightedIndex: 0,

      highlightPrevious() {
        if (this.highlightedIndex > 0) {
          this.highlightedIndex = this.highlightedIndex - 1;
        } else {
            let jobs = this.$refs.results.childNodes[3].children.length
            let companies = this.$refs.results.childNodes[7].children.length
            this.highlightedIndex = companies + jobs - 1;
        }
        this.scrollIntoView();
      },

      highlightNext() {
        let jobs = this.$refs.results.childNodes[3].children.length
        let companies = this.$refs.results.childNodes[7].children.length

        if (this.highlightedIndex < (jobs + companies) - 1) {
          this.highlightedIndex = this.highlightedIndex + 1;
        } else {
            this.highlightedIndex = 0;
        }
        this.scrollIntoView();
      },

      scrollIntoView() {
        if (this.highlightedIndex < this.$refs.results.childNodes[3].children.length) {
            this.$refs.results.childNodes[3].children[this.highlightedIndex].scrollIntoView({
              block: 'nearest',
              behavior: 'smooth'
            });
        } else {
             this.$refs.results.childNodes[7].children[this.highlightedIndex - this.$refs.results.childNodes[3].children.length].scrollIntoView({
              block: 'nearest',
              behavior: 'smooth'
            });
        }

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

    <input

        wire:model.debounce.300ms="searchJob"

        @keydown.arrow-down.stop.prevent="highlightNext()"

        @keydown.arrow-up.stop.prevent="highlightPrevious()"

        @keydown.escape="onEscape()"

        @keydown.enter.stop.prevent="$dispatch('value-selected', {
            id: $refs.results.children[highlightedIndex].getAttribute('data-result-id'),
            name: $refs.results.children[highlightedIndex].getAttribute('data-result-name')
        })"

        x-ref="input"

        type="text"

        class="w-full h-full px-4 font-medium text-gray-700 rounded-lg sm:text-lg focus:bg-gray-50 focus:outline-none"

        placeholder="What Are You Searching For?">

    <ul
        x-show="open"

        x-cloak

        @click.away="open = false"

        x-transition:leave="transition ease-in duration-150"

        x-transition:leave-start="opacity-100"

        x-transition:leave-end="opacity-0"

        class="absolute w-full max-h-96 z-20 scroll-pt-11 scroll-pb-2 space-y-2 overflow-y-auto pb-2 bg-white"

        id="options"

        role="listbox">

        <li x-ref="results">

                @php
                    $chunks = collect($items)->chunkWhile(function ($value, $key, $chunk) {
                        return array_key_exists('company_id', $value) === array_key_exists('company_id', $chunk->last());
                    });

                    $labels = ['Jobs', 'Companies'];

                @endphp

                @forelse($chunks as $key => $chunk)

                    <h2 class="bg-gray-100 py-4 px-4 text-xs font-semibold text-gray-900">{{ $labels[$key] }}</h2>
                    <ul class="mt-2 text-sm text-gray-800">
                        @foreach ($chunk as $index => $item)
                            <li
                                wire:key="{{ $index }}"

                                @mouseenter="highlightedIndex = {{ $index }}"

                                @mouseleave="highlightedIndex = null"

                                :class="{ 'bg-gray-100': highlightedIndex === {{ $index }}, '': !(highlightedIndex === {{ $index }}) }"

                                data-result-id="{{ $item['id'] }}"

                                data-result-name="{{ $item['name'] }}"

                                @click.stop="$dispatch('value-selected', {
                                    id: {{ $item['id'] }},
                                    name: '{{ $item['name'] }}'
                                })"

                                class="group flex cursor-default select-none rounded-xl p-3"

                                id="option-1"

                                role="option"

                                tabindex="-1">

                                <img class="flex flex-none h-10 w-10 rounded-full" src="{{ $item['avatar_url'] }}" alt="{{ $item['name'] }}">
                                <div class="ml-4 flex-auto">
                                    <!-- Active: "text-gray-900", Not Active: "text-gray-700" -->
                                    <p
                                        :class="{ 'text-gray-900': highlightedIndex === {{ $index }}, 'text-gray-700': !(highlightedIndex === {{ $index }}) }"
                                        class="text-sm font-medium">
                                        {{ $item['name'] }}-{{ $index }}
                                    </p>
                                    <!-- Active: "text-gray-700", Not Active: "text-gray-500" -->
                                    <p
                                        :class="{ 'text-gray-700': highlightedIndex === {{ $index }}, 'text-gray-500': !(highlightedIndex === {{ $index }}) }"
                                        class="text-sm">
                                        {{ isset($item['categories'][0]) ? $item['categories'][0]['name'] : '' }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @empty
                @endforelse

        </li>
        <li>
            <h2 class="bg-gray-100 py-4 px-4 text-xs font-semibold text-gray-900">Projects</h2>
            <ul class="mt-2 text-sm text-gray-800">
                <!-- Active: "bg-indigo-600 text-white" -->
                <li class="cursor-default select-none px-4 py-2" id="option-3" role="option" tabindex="-1">Workflow Inc. / Website Redesign</li>
                <li class="cursor-default select-none px-4 py-2" id="option-3" role="option" tabindex="-1">Multinational LLC. / Animation</li>
            </ul>
        </li>

        @unless($items)

            <!-- Empty state, show/hide based on command palette state -->
            <div class="border-t border-gray-100 py-6 px-6 text-center text-sm sm:px-14 bg-white">
                <!-- Heroicon name: outline/emoji-sad -->
                <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="mt-4 font-semibold text-gray-900">No results found</p>
                <p class="mt-2 text-gray-500">We couldn’t find anything with that term. Please try again.</p>
            </div>

        @endunless
    </ul>

</div>
