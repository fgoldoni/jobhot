<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="py-2 align-middle inline-block min-w-full">

                    <!-- Top Bar -->
                    <x-top-bar>
                        <x-input.search wire:model="filters.search" placeholder="Search Items ..."></x-input.search>
                        <ul class="flex items-center font-demibold space-x-4">
                            <li>
                                <x-button.link wire:click="toggleShowFilters">@if ($showFilters) Hide @endif Advanced Search...
                                </x-button.link>
                            </li>
                        </ul>

                        <x-slot name="actions">
                            <x-button wire:click="create">
                                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                <span>CREATE</span>
                            </x-button>
                            <x-input.base-select wire:model="perPage" id="perPage" class="bg-white">
                                <option value="5">05</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </x-input.base-select>
                        </x-slot>
                    </x-top-bar>

                    <!-- Advanced Search -->
                    <div>
                        @if ($showFilters)
                            <x-filters>
                                <x-slot name="filtersRight">
                                    <x-input.group inline for="filter-state" label="Status">
                                        <x-input.base-select wire:model="filters.state" id="filter-state">
                                            <option value="" selected>Select Status...</option>

                                            <option value="{{ (\App\Enums\CompanyState::Draft)->value }}">{{ (\App\Enums\CompanyState::Draft)->value }}</option>
                                            <option value="{{ (\App\Enums\CompanyState::Published)->value }}">{{ (\App\Enums\CompanyState::Published)->value }}</option>
                                            <option value="{{ (\App\Enums\CompanyState::Archived)->value }}">{{ (\App\Enums\CompanyState::Archived)->value }}</option>
                                            <option value="{{ (\App\Enums\CompanyState::Hold)->value }}">{{ (\App\Enums\CompanyState::Hold)->value }}</option>
                                        </x-input.base-select>
                                    </x-input.group>
                                </x-slot>

                                <x-slot name="filtersLeft">
                                    <x-input.group inline for="filter-date-min" label="Minimum Date">
                                        <x-input.date  type="text" wire:model="filters.date-min" id="filter-date-min" placeholder="MM/DD/YYYY" />
                                    </x-input.group>

                                    <x-input.group inline for="filter-date-max" label="Maximum Date">
                                        <x-input.date  type="text" wire:model="filters.date-max" id="filter-date-max" placeholder="MM/DD/YYYY" />
                                    </x-input.group>

                                    <button wire:click="resetFilters" class="float-right text-indigo-600 hover:text-indigo-900 hover:underline">
                                        Reset Filters
                                    </button>
                                </x-slot>
                            </x-filters>
                        @endif
                    </div>

                    <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                        @php
                            $isOneSelected = (is_array($selected) && count($selected) > 0) || (!is_array($selected) && count($selected->toArray()) > 0);
                        @endphp
                        @if($isOneSelected)
                            <!-- Row actions -->
                            <x-row-actions>
                                <button type="button" class="btn-secondary inline-flex items-center px-2.5 py-1.5 text-xs font-medium disabled:cursor-not-allowed disabled:opacity-30">
                                    <!-- Heroicon name: solid/mail -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    <span>CSV</span>
                                </button>
                                <button type="button" class="btn-secondary inline-flex items-center px-2.5 py-1.5 text-xs font-medium disabled:cursor-not-allowed disabled:opacity-30">
                                    <!-- Heroicon name: solid/mail -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span>DELETE</span>
                                </button>
                            </x-row-actions>
                        @endif


                        <!-- Companies Table -->
                        <table class="min-w-full table-fixed divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">
                                    <input wire:model="selectPage" type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                </th>
                                <th scope="col" class="w-12 sm:w-16 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-500 uppercase">
                                    <a href="#" class="group inline-flex">
                                        Id
                                        <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                        <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                          <!-- Heroicon name: solid/chevron-down -->
                                          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                          </svg>
                                        </span>
                                    </a>
                                </th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-500 sm:pl-6 uppercase">
                                    <a href="#" class="group inline-flex">
                                        Name
                                        <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                        <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                          <!-- Heroicon name: solid/chevron-down -->
                                          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                          </svg>
                                        </span>
                                    </a>
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-500 uppercase">
                                    <a href="#" class="group inline-flex">
                                        Industry
                                        <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                        <span class="ml-2 flex-none rounded bg-gray-200 text-gray-900 group-hover:bg-gray-300">
                                          <!-- Heroicon name: solid/chevron-down -->
                                          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                          </svg>
                                        </span>
                                    </a>
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-500 uppercase">Status</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-500 uppercase">Role</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @if ($selectPage)
                                <tr class="bg-gray-200" wire:key="row-message">
                                    <td colspan="7" class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                        @unless ($selectAll)
                                            <div>
                                                <span>You have selected <strong>{{ $rows->count() }}</strong> items, do you want to select all <strong>{{ $rows->total() }}</strong>?</span>
                                                <button wire:click="selectAll" class="ml-1 text-indigo-600 hover:text-indigo-900 hover:underline">Select All</button>
                                            </div>
                                        @else
                                            <span>You are currently selecting all <strong>{{ $rows->total() }}</strong> items.</span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                            @forelse ($rows as $row)
                                @php
                                    $isSelected = (is_array($selected) && in_array($row->id, $selected)) || (!is_array($selected) && in_array($row->id, $selected->toArray()));
                                @endphp
                                <tr class="{{  $isSelected ? 'bg-gray-50' : '' }}">
                                    <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                        <!-- Selected row marker, only show when row is selected. -->
                                        @if($isSelected)
                                            <div class="absolute inset-y-0 left-0 w-0.5 bg-indigo-600"></div>
                                        @endif

                                        <input wire:model="selected" value="{{ $row->id }}" type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <button wire:click="edit({{ $row->id }})" class="ml-1 text-indigo-600 hover:text-indigo-900 hover:underline">
                                            {{$row->id}}
                                        </button>
                                    </td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full" src="{{ $row->avatar_url }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{ $row->name  }}</div>
                                                <div class="text-gray-500">{{ $row->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @foreach ($row->categories as $category)
                                            <p class="flex items-center text-gray-500">
                                                <x-icon.solid type="{{$category->icon}}" class="mr-1.5 h-5 w-5 text-gray-500"/>

                                                <span class="truncate text-gray-900">{{ $category->name }}</span>
                                            </p>
                                        @endforeach
                                        <div class="text-gray-500">{{ $row->phone }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <div class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5 m-1 cursor-pointer">
                                            <div class="absolute flex-shrink-0 flex items-center justify-center">
                                            <span class="h-1.5 w-1.5 rounded-full
                                                {{ $row->state->value === 'draft' ? ' bg-rose-500' : '' }}
                                                {{ $row->state->value === 'published' ? ' bg-green-500' : '' }}
                                                {{ $row->state->value === 'archived' ? ' bg-gray-500' : '' }}
                                                {{ $row->state->value === 'hold' ? ' bg-amber-500' : '' }}"
                                                  aria-hidden="true">
                                            </span>
                                            </div>
                                            <div class="ml-3.5 font-medium text-gray-500">{{ ucfirst($row->state->value) }}</div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $row->created_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <x-dropdown align="right" width="w-32">
                                            <x-slot name="trigger">
                                                <button type="button" class="bg-gray-100 rounded-full flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                                    <span class="sr-only">Open options</span>
                                                    <!-- Heroicon name: solid/dots-vertical -->
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>

                                            <x-slot name="content">
                                                <x-dropdown-link wire:click="edit({{ $row->id }})" class="group flex items-center cursor-pointer">
                                                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                    </svg>
                                                    Edit
                                                </x-dropdown-link>

                                                <x-dropdown-link href="{{ route('impersonate', $row->id) }}" class="group flex items-center">
                                                    <!-- Heroicon name: solid/user-add -->
                                                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                                    </svg>
                                                    {{ __('Login As') }}
                                                </x-dropdown-link>
                                            </x-slot>
                                        </x-dropdown>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="whitespace-nowrap" colspan="7">
                                        <div class="flex justify-center items-center space-x-2">
                                            <x-icon.inbox class="h-8 w-8 text-gray-400" />
                                            <span class="font-medium py-8 text-gray-400 text-xl">No items found...</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                            <!-- More people... -->
                            </tbody>
                        </table>
                        <div>
                            {{ $rows->links('livewire::pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Save Company Modal -->
    @include('admin.companies.save-company-modal')
</div>
@push('scripts')

@endpush
