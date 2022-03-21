<div class="flex items-center px-6 py-4 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 xl:px-0">
    <div class="w-full">
        <label for="search" class="sr-only">Search</label>
        <x-input.jobs-search :items="$jobs" wire:model="searchJob" wire:key="search-jobs"></x-input.jobs-search>
    </div>
</div>
