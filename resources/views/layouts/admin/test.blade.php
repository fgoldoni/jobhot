@props(['items'])
<!-- This example requires Tailwind CSS v2.0+ -->
<div>
    <div class="relative" x-data="{
        open: true,
        items: ['Red', 'Orange', 'Yellow']
        selectedIndex: 1,
        activeIndex: 1,
        optionCount: this.$refs.listbox.children.length,
        onButtonClick()
        {
            this.open ||
            (
                this.activeIndex = this.selectedIndex,
                this.open=!0,
                this.$nextTick(( ()=> {
                    this.$refs.listbox.focus(),
                    this.$refs.listbox.children[this.activeIndex].scrollIntoView({ block: 'nearest' })
                }))
            )
        },
        onOptionSelect(){
            null!==this.activeIndex && (this.selectedIndex=this.activeIndex),
            this.open=!1,
            this.$refs.button.focus()
        },
        onEscape(){
            this.open = !1,
            this.$refs.button.focus()
        },
        onArrowUp(){
            this.activeIndex = this.activeIndex-1 < 0 ? this.optionCount - 1 : this.activeIndex - 1,
            this.$refs.listbox.children[this.activeIndex].scrollIntoView({ block: 'nearest' })
       },
       onArrowDown(){
            this.activeIndex = this.activeIndex + 1 > this.optionCount -1 ? 0 : this.activeIndex + 1,
            this.$refs.listbox.children[this.activeIndex].scrollIntoView({ block: 'nearest' })
       }">
        <button
            @keydown.arrow-up.stop.prevent="onButtonClick()"
            @keydown.arrow-down.stop.prevent="onButtonClick()"
            @click="onButtonClick()"
            x-ref="button"
            type="button"
            class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            aria-haspopup="listbox"
            aria-expanded="true"
            aria-labelledby="listbox-label">
      <span class="flex items-center">
        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
        <span class="ml-3 block truncate">Wade Cooper</span>
      </span>
            <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
        <!-- Heroicon name: solid/selector -->
        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </span>
        </button>

        <!--
          Select popover, show/hide based on select state.

          Entering: ""
            From: ""
            To: ""
          Leaving: "transition ease-in duration-100"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <ul
            x-show="open"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @keydown.arrow-up.prevent="onArrowUp()"
            @keydown.arrow-down.prevent="onArrowDown()"
            @keydown.enter.stop.prevent="onOptionSelect()"
            @keydown.space.stop.prevent="onOptionSelect()"
            @keydown.escape="onEscape()"
            @click.away="open = false"
            x-cloak
            x-ref="listbox"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
            tabindex="-1"
            role="listbox"
            aria-labelledby="listbox-label"
            aria-activedescendant="listbox-option-3">
            <!--
              Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

              Highlighted: "text-white bg-indigo-600", Not Highlighted: "text-gray-900"
            -->
            <template x-for="(item, index) in items">
                <li
                    :class="{ 'text-white bg-indigo-600': activeIndex === index, 'text-gray-900': !(activeIndex === index) }"
                    class="cursor-default select-none relative py-2 pl-3 pr-9" id="listbox-option-0" role="option">
                    <div class="flex items-center">
                        <x-icon.solid type="item.icon" class="mr-1.5 h-6 w-6 text-gray-600"/>
                        <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                        <span
                            :class="{ 'font-semibold': selectedIndex === index, 'font-normal': !(selectedIndex === index) }"
                            class="ml-3 block truncate" x-text="item.name"></span>
                    </div>

                    <!--
                      Checkmark, only display for selected option.

                      Highlighted: "text-white", Not Highlighted: "text-indigo-600"
                    -->
                    <span
                        x-cloak
                        x-show="selectedIndex === index"
                        :class="{ 'text-white': activeIndex === index, 'text-indigo-600': !(activeIndex === index) }"
                        class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <!-- Heroicon name: solid/check -->
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            </template>
            <!-- More items... -->
        </ul>
    </div>
</div>
