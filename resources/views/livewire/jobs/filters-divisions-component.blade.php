<div>
    @foreach($rows as $items)
        @foreach($items as $row)
            <div class="hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 cursor-pointer">
                <input id="filter-cities-{{ $row->id }}"  wire:model="selected" value="{{ $row->id }}" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                <label for="filter-cities-{{ $row->id }}" class="flex-1 ml-3 text-sm text-gray-600"> {{ $row->name }}  </label>
                <span class="bg-gray-100 group-hover:bg-gray-200 ml-3 inline-block py-0.5 px-3 text-xs font-medium rounded-full"> {{ $row->jobs_count }} </span>
            </div>
        @endforeach
    @endforeach
    <div>
        <a wire:click="load" class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg cursor-pointer">Load More...</a>
    </div>
</div>

