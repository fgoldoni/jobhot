<div>
    <div class="text-gray-900  bg-gray-200  text-sm shadow">
        <nav class="text-gray-900 px-4 py-2 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <!-- Heroicon name: solid/mail -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" wire:model="filters.search" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Search Items ...">
                </div>
            </div>
            <div class="flex items-center space-x-5 text-white">
                <button type="button" class="btn inline-flex items-center px-4 py-2 text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <!-- Heroicon name: solid/mail -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-3 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Button text
                </button>
            </div>
        </nav>
    </div>
    <ul  wire:sortable="updateTaskOrder" role="list" class="space-y-3">
        @foreach ($rows as $row)
            <li wire:sortable.item="{{ $row->id }}" wire:key="category-{{ $row->id }}" class="bg-white shadow overflow-hidden rounded-md">
                <a href="javascript:;" class="block hover:bg-gray-50">
                    <div class="flex items-center px-4 py-4 sm:px-6">
                        <div class="min-w-0 flex-1 flex items-center">
                            <div class="flex-shrink-0"  wire:sortable.handle>
                                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                <div>
                                    <p class="flex items-center text-sm text-gray-500">
                                        <!-- Heroicon name: solid/mail -->
                                        <x-icon.solid type="{{$row->icon}}" class="mr-1.5 h-6 w-6 text-gray-600"/>
                                        <span class="truncate text-base">{{ $row->name }}</span>
                                    </p>
                                    <p class="mt-2 truncate">
                                        @livewire('admin.toggle-component', ['model' => $row, 'field' => 'online'], key($row->id))
                                    </p>
                                </div>
                                <div class="hidden md:block">
                                    <div>
                                        <p class="text-sm text-gray-900">
                                            Applied on
                                            <time datetime="2020-01-07">January 7, 2020</time>
                                        </p>
                                        <p class="mt-2 flex items-center text-sm text-gray-500">
                                            <!-- Heroicon name: solid/check-circle -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                            Completed phone screening
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
