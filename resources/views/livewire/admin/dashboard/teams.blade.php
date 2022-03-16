<div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
    <dt>
        <div class="absolute bg-indigo-500 rounded-md p-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6  text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
            </svg>
        </div>
        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Teams</p>
    </dt>
    <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
        <p class="text-2xl font-semibold text-gray-900">{{ $rows->count() }}</p>
        <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
            <!-- Heroicon name: solid/arrow-sm-up -->
            <svg class="self-center flex-shrink-0 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
            <span class="sr-only"> Increased by </span>
            122
        </p>
        <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
            <div class="text-sm">
                <a href="{{ route('admin.teams') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Total Subscribers stats</span></a>
            </div>
        </div>
    </dd>
</div>
