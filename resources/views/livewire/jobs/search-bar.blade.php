<div class="w-full px-2 lg:px-6">
    <label for="search" class="sr-only">Search projects</label>
    <x-input.jobs-search :items="$jobs" wire:model="searchJob" wire:key="search-jobs"></x-input.jobs-search>
</div>
