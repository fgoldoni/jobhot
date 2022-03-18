<div class="relative z-30 h-48 px-10 bg-white lg:h-32">
    <form onsubmit="return false;" class="flex flex-col items-center h-auto max-w-lg p-6 mx-auto space-y-3 transform -translate-y-12 bg-white rounded-lg shadow-md lg:h-24 lg:max-w-6xl lg:flex-row lg:space-y-0 lg:space-x-3">
        <x-input.jobs-select :items="$jobs" wire:model="searchJob" wire:key="search-jobs"></x-input.jobs-select>
        <div class="w-0.5 bg-gray-100 h-10 lg:block hidden"></div>
        <x-input.countries-select :items="$countries" wire:model="selectedCountry" wire:key="search-countries"></x-input.countries-select>
        <div class="w-full h-full lg:w-auto">
            <button type="submit" class="inline-flex items-center justify-center w-full h-full px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 lg:w-64">SEARCH</button>
        </div>
    </form>
</div>
