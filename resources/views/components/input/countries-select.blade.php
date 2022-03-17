@props(['items'])

<div
    class="relative flex items-center w-full h-12 border-2 border-gray-200 rounded-lg lg:w-auto lg:border-0 lg:flex-1"

    x-data="{

      open: @entangle('showDropdown'),

      search: @entangle('search'),

      selected: @entangle('selected'),

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
        this.search = name;
        this.open = false;
        this.highlightedIndex = 0;
      },

     }"

     @value-selected.window="updateSelected($event.detail.id, $event.detail.name)">

    <input
        wire:model.debounce.300ms="search"

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

        placeholder="Location?">

    <svg class="absolute right-0 w-6 h-6 mr-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
    </svg>


    <ul
        x-ref="results"

        x-show="open"

        x-cloak

        @click.away="open = false"

        x-transition:leave="transition ease-in duration-150"

        x-transition:leave-start="opacity-100"

        x-transition:leave-end="opacity-0"

        class="absolute top-12 z-10 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"

        id="options"

        role="listbox">

        @forelse($items as $index => $item)
            <li
                wire:key="{{ $index }}"

                @mouseenter="highlightedIndex = {{ $index }}"

                @mouseleave="highlightedIndex = null"

                :class="{ 'text-white bg-indigo-600': highlightedIndex === {{ $index }}, 'text-gray-900': !(highlightedIndex === {{ $index }}) }"

                data-result-id="{{ $item->id }}"

                data-result-name="{{ $item->name }}"

                @click.stop="$dispatch('value-selected', {
                    id: {{ $item->id }},
                    name: '{{ $item->name }}'
                })"

                class="cursor-default select-none relative py-2 pl-3 pr-9"

                id="listbox-option-{{ $item->id }}"

                role="option">

                <div class="flex items-center">
                    <span>{{ $item->emoji }} </span>
                    <span class="font-normal ml-3 block truncate"> {{ $item->name }} </span>
                </div>

                <span
                    x-cloak
                    x-show="highlightedIndex === {{ $index }}"
                    :class="{ 'text-white': highlightedIndex === {{ $index }}, 'text-indigo-600': !(highlightedIndex === {{ $index }}) }"
                    class="absolute inset-y-0 right-0 flex items-center pr-4">
                    <!-- Heroicon name: solid/check -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </span>
            </li>
        @empty
            <li class="cursor-default select-none relative">
                <div class="flex justify-center items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500 transition text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <span class="font-medium py-3 text-gray-400 text-xl">No items found...</span>
                </div>
            </li>
        @endforelse

    </ul>

</div>
