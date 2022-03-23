@props(['rows'])

<div class="bg-white shadow overflow-hidden sm:rounded-md">
    <div class="pl-6 pt-4 text-gray-400 text-xs flex flex-wrap items-center">
        <div wire:loading>

            <button type="button" class="inline-flex items-center transition ease-in-out duration-150 cursor-not-allowed" disabled="">

                <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>

                Processing...

            </button>

        </div>

        <span wire:loading.remove>About {{ $rows->total() }} results ...</span>

    </div>

    <ul role="list" class="divide-y space-y-5 p-4 divide-gray-200">
        @forelse($rows as $row)
            <x-jobs.item :row="$row" wire:key="item-{{$row->id}}"></x-jobs.item>
        @empty
        @endforelse
    </ul>

    <div>
        {{ $rows->links('livewire::pagination-links') }}
    </div>
</div>
