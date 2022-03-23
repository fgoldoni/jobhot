@props(['rows'])

<div class="bg-white shadow overflow-hidden sm:rounded-md">
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
