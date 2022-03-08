<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($rows as $row)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ $row->avatar_url }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div>
                                            <span class="text-sm font-medium text-gray-900">{{ $row->name }}</span>
                                        </div>

                                        <div class="text-sm text-gray-500">{{ $row->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $row->phone }}
                                </div>
                                <div class="text-sm text-gray-500">{{ $row->created_at->diffForHumans() }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5 m-1">
                                    <div class="absolute flex-shrink-0 flex items-center justify-center">
                                        <span class="h-1.5 w-1.5 rounded-full bg-indigo-500" aria-hidden="true"></span>
                                    </div>
                                    <div class="ml-3.5 font-medium text-gray-500">{{ $row->state->value }}</div>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ is_null($row->user)  ? $row->user_id : $row->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="javascript:;"  wire:click="edit({{ $row->id }})" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="whitespace-nowrap" colspan="6">
                                acaca
                            </td>
                        </tr>
                    @endforelse

                    <!-- More people... -->
                    </tbody>
                </table>
                <div>
                    {{ $rows->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Save Transaction Modal -->
    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title">Edit</x-slot>

            <x-slot name="content">
                <div class="space-y-8 sm:space-y-5">
                    <div>
                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start border-t border-gray-200 sm:pt-5">
                                <x-label for="name" class="sm:mt-px sm:pt-2">{{ __('Name') }} </x-label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <x-input type="text" wire:model.defer="editing.name" id="name"  placeholder="Name" class="max-w-lg w-full"/>
                                </div>
                            </div>
                            @if($showEditor)
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                    <x-label for="content" class="sm:mt-px sm:pt-2">{{ __('Content') }} </x-label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <x-input.rich-text wire:model.lazy="editing.content" id="content" initial-value="editing.content" />
                                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about your company.</p>
                                    </div>
                                </div>
                            @else
                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                    <x-label for="content" class="sm:mt-px sm:pt-2">{{ __('Content') }} </x-label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <x-input.textarea id="content" wire:model.defer="editing.content" rows="3"></x-input.textarea>
                                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p>
                                    </div>
                                </div>
                            @endif

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start border-t border-gray-200 sm:pt-5">
                                <x-label for="tags" class="sm:mt-px sm:pt-2">{{ __('Tags') }} </x-label>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <x-input type="text"  id="tags"  placeholder="Tags" class="max-w-lg w-full"/>
                                    <p class="mt-2 text-sm text-gray-500">Enter the tags separated by commas.</p>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:pt-5">
                                <x-label for="avatar" class="sm:mt-px sm:pt-2">{{ __('Logo') }} </x-label>
                                <x-input.file-upload wire:model="avatar" id="avatar">
                                    @if ($avatar)
                                        <img src="{{ $avatar->temporaryUrl() }}" alt="Avatar">
                                    @else
                                        <img src="{{ $editing->avatar_url }}" alt="Avatar">
                                    @endif
                                </x-input.file-upload>
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
