@props(['rows'])

<div class="bg-white shadow overflow-hidden sm:rounded-md">
    <div class="pl-10 py-4">About {{ $rows->total() }} results ...</div>
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
