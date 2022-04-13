<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="py-2 align-middle inline-block min-w-full">

                    <!-- Top Bar -->
                    <x-top-bar>
                        <x-input.search wire:model="filters.search" placeholder="{{ __('table.search_items') }}"></x-input.search>
                        <ul class="flex items-center font-demibold space-x-4">
                            <li>
                                <x-button.link wire:click="toggleShowFilters">@if ($showFilters) {{ __('table.hide') }} @endif {{ __('table.advanced_search') }}</x-button.link>
                            </li>
                        </ul>

                        <x-slot name="actions">
                            <x-secondary-button wire:click="resetFilters">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                                </svg>
                            </x-secondary-button>
                            <x-button wire:click="create">
                                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ __('table.created') }}</span>
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
                                            <option value="" selected>{{ __('table.select_status') }}</option>

                                            <option value="{{ (\App\Enums\CompanyState::Draft)->value }}">{{ (\App\Enums\CompanyState::Draft)->value }}</option>
                                            <option value="{{ (\App\Enums\CompanyState::Published)->value }}">{{ (\App\Enums\CompanyState::Published)->value }}</option>
                                            <option value="{{ (\App\Enums\CompanyState::Archived)->value }}">{{ (\App\Enums\CompanyState::Archived)->value }}</option>
                                            <option value="{{ (\App\Enums\CompanyState::Hold)->value }}">{{ (\App\Enums\CompanyState::Hold)->value }}</option>
                                        </x-input.base-select>
                                    </x-input.group>
                                </x-slot>

                                <x-slot name="filtersLeft">
                                    <x-input.group inline for="filter-date-min" label="{{ __('table.minimum_date') }}">
                                        <x-input.date  type="text" wire:model="filters.date-min" id="filter-date-min" placeholder="MM/DD/YYYY" />
                                    </x-input.group>

                                    <x-input.group inline for="filter-date-max" label="{{ __('table.maximum_date') }}">
                                        <x-input.date  type="text" wire:model="filters.date-max" id="filter-date-max" placeholder="MM/DD/YYYY" />
                                    </x-input.group>

                                    <button wire:click="resetFilters" class="float-right text-indigo-600 hover:text-indigo-900 hover:underline">
                                        {{ __('table.reset_filters') }}
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
                                <button type="button" wire:click="exportSelected" class="btn-secondary inline-flex items-center px-2.5 py-1.5 text-xs font-medium disabled:cursor-not-allowed disabled:opacity-30">
                                    <!-- Heroicon name: solid/mail -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    <span>CSV</span>
                                </button>
                                <button type="button" wire:click="$toggle('showDeleteModal')" class="btn-secondary inline-flex items-center px-2.5 py-1.5 text-xs font-medium disabled:cursor-not-allowed disabled:opacity-30">
                                    <!-- Heroicon name: solid/mail -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span>DELETE</span>
                                </button>
                            </x-row-actions>
                        @endif


                        <!-- Companies Table -->
                       <x-table>
                           <x-slot name="head">
                               <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">
                                   <input wire:model="selectPage" type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                               </th>
                               <x-table.heading sortable wire:click="sortBy('id')" :direction="$sorts['id'] ?? null">{{ __('table.id') }}</x-table.heading>
                               <x-table.heading sortable wire:click="sortBy('name')" :direction="$sorts['name'] ?? null">{{ __('table.name') }}</x-table.heading>
                               <x-table.heading>Industry</x-table.heading>
                               <x-table.heading sortable wire:click="sortBy('state')" :direction="$sorts['state'] ?? null">{{ __('table.status') }}</x-table.heading>
                               <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sorts['created_at'] ?? null">{{ __('table.created') }}</x-table.heading>
                               <x-table.heading/>
                           </x-slot>
                           <x-slot name="body">
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
                                   <x-table.row class="{{  $isSelected ? 'bg-gray-50' : '' }}">
                                       <x-table.cell class="relative w-12 px-6 sm:w-16 sm:px-8">
                                           <!-- Selected row marker, only show when row is selected. -->
                                           @if($isSelected)
                                               <div class="absolute inset-y-0 left-0 w-0.5 bg-indigo-600"></div>
                                           @endif

                                           <input wire:model="selected" value="{{ $row->id }}" type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                       </x-table.cell>
                                       <x-table.cell>
                                           <button wire:click="edit({{ $row->id }})" class="ml-1 text-indigo-600 hover:text-indigo-900 hover:underline">
                                               {{$row->id}}
                                           </button>
                                       </x-table.cell>
                                       <x-table.cell>
                                           <div class="flex items-center">
                                               <div class="h-10 w-10 flex-shrink-0">
                                                   <img class="h-10 w-10 rounded-full" src="{{ $row->avatar_url }}" alt="">
                                               </div>
                                               <div class="ml-4">
                                                   <div class="font-medium text-gray-900">
                                                       <button wire:click="edit({{ $row->id }})" class="font-medium text-indigo-500 hover:text-indigo-900 hover:underline">
                                                           {{$row->name}}
                                                       </button>
                                                   </div>
                                                   <div class="text-gray-500">{{ $row->email }}</div>
                                               </div>
                                           </div>
                                       </x-table.cell>
                                       <x-table.cell>
                                           <p class="flex items-center">
                                               @foreach($row->categories as $category)
                                                   <x-icon.solid type="academic" class="mr-1.5 h-5 w-5 text-gray-500"/>

                                                   <span class="truncate text-gray-700">{{ $category->name }}</span>
                                               @endforeach
                                           </p>
                                           <span class="text-sm text-indigo-500 hover:underline cursor-pointer">{{ $row->jobs ? $row->jobs->count() : 0 }}  Job(s)</span>
                                       </x-table.cell>
                                       <x-table.cell>
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
                                       </x-table.cell>
                                       <x-table.cell>
                                           <div class="text-gray-900">{{ $row->created_at->format('d, M Y a H:m') }}</div>
                                           <div class="text-gray-500">Last Modified: {{ $row->updated_at->diffForHumans() }}</div>
                                       </x-table.cell>
                                       <x-table.cell class="px-6 py-4">
                                           <x-button.link wire:click="edit({{ $row->id }})" class="font-medium text-indigo-500 hover:text-indigo-900 hover:underline">
                                               Edit
                                           </x-button.link>
                                       </x-table.cell>
                                   </x-table.row>
                               @empty
                                  <x-table.row>
                                       <td class="whitespace-nowrap" colspan="7">
                                           <div class="flex justify-center items-center space-x-2">
                                               <x-icon.inbox class="h-8 w-8 text-gray-400" />
                                               <span class="font-medium py-8 text-gray-400 text-xl">No items found...</span>
                                           </div>
                                       </td>
                                   </x-table.row>
                               @endforelse
                           </x-slot>
                       </x-table>

                        <div>
                            {{ $rows->links('livewire::pagination-links') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Transactions Modal -->
    <form wire:submit.prevent="deleteSelected">
        <x-confirmation-modal wire:model.defer="showDeleteModal">
            <x-slot name="title">Delete</x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">Are you sure you? This action is irreversible.</div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showDeleteModal', false)">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button type="submit" class="ml-3" >
                    {{ 'Delete' }}
                </x-button>
            </x-slot>
        </x-confirmation-modal>
    </form>

    <!-- Save Company Modal -->
    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title">Edit</x-slot>

            <x-slot name="content">
                <div class="space-y-8 sm:space-y-5">
                    <div>
                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center border-t border-gray-200 sm:pt-5">
                                <x-label for="avatar" class="sm:mt-px sm:pt-2">{{ __('Logo') }} </x-label>
                                <x-input.file-upload wire:model="avatar" id="avatar" error="{{ $errors->first('avatar') }}">
                                    @if ($avatar)
                                        <img src="{{ $avatar->temporaryUrl() }}" alt="Avatar">
                                    @else
                                        <img src="{{ $editing->avatar_url }}" alt="Avatar">
                                    @endif
                                </x-input.file-upload>

                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                <x-label for="name" class="sm:mt-px sm:pt-2">{{ __('Name') }} </x-label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <x-input type="text" wire:model.defer="editing.name" id="name"  placeholder="Name" class="max-w-lg w-full"/>
                                     @if ($errors->has('editing.name'))
                                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('editing.name') }}</p>
                                     @endif
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                <x-label for="name" class="sm:mt-px sm:pt-2">{{ __('Industry') }} </x-label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <x-input.select :items="$industries" :selected="$selectedItem" wire:model.defer="selectedItem" wire:key="companies-field-selectedItem-{{ $editing->id }}"></x-input.select>
                                </div>
                                @if ($errors->has('selectedItem'))
                                    <p class="mt-2 text-sm text-red-600">{{ $errors->first('selectedItem') }}</p>
                                @endif
                            </div>


                            @if($showEditor)
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                    <x-label for="content" class="sm:mt-px sm:pt-2">{{ __('Content') }} </x-label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <x-input.rich-text wire:model.lazy="editing.content" id="content" initial-value="editing.content" />
                                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about your company.</p>
                                        @if ($errors->has('editing.content'))
                                            <p class="mt-2 text-sm text-red-600">{{ $errors->first('editing.content') }}</p>
                                         @endif
                                    </div>
                                </div>
                            @else
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                    <x-label for="content" class="sm:mt-px sm:pt-2">{{ __('Content') }} </x-label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <x-input.textarea id="content" wire:model.defer="editing.content" rows="3"></x-input.textarea>
                                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>
                                        @if ($errors->has('editing.content'))
                                            <p class="mt-2 text-sm text-red-600">{{ $errors->first('editing.content') }}</p>
                                         @endif
                                    </div>
                                </div>
                            @endif

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                <x-label for="state" class="sm:mt-px sm:pt-2">{{ __('State') }} </x-label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <x-input.dot-select :items="$states" :selected="$selectedState" wire:model.defer="selectedState" wire:key="states-field-{{ $editing->id }}"></x-input.dot-select>
                                    @if ($errors->has('selectedState'))
                                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('selectedState') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                <x-label for="phone" class="sm:mt-px sm:pt-2">{{ __('Phone') }} </x-label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <x-input type="text" wire:model.defer="editing.phone" id="phone"  placeholder="Phone" class="max-w-lg w-full"/>
                                    @if ($errors->has('editing.phone'))
                                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('editing.phone') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                <x-label for="email" class="sm:mt-px sm:pt-2">{{ __('Email') }} </x-label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <x-input type="email" wire:model.defer="editing.email" id="email"  placeholder="Email" class="max-w-lg w-full"/>
                                    @if ($errors->has('editing.email'))
                                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('editing.email') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showEditModal', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button class="ml-3" wire:loading.attr="disabled">
                    {{ 'Save' }}
                </x-button>
            </x-slot>
        </x-modal.dialog>
    </form>
</div>
@push('scripts')

@endpush
