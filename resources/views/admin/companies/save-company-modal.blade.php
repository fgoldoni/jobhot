<form wire:submit.prevent="save">
    <x-modal.dialog wire:model.defer="showEditModal">
        <x-slot name="title">Edit</x-slot>

        <x-slot name="content">
            <div class="space-y-8 sm:space-y-5">
                <div>
                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center border-t border-gray-200 sm:pt-5">
                            <x-label for="avatar" class="sm:mt-px sm:pt-2">{{ __('Logo') }} </x-label>
                            <x-input.file-upload wire:model="avatar" id="avatar">
                                @if ($avatar)
                                    <img src="{{ $avatar->temporaryUrl() }}" alt="Avatar">
                                @else
                                    <img src="{{ $editing->avatar_url }}" alt="Avatar">
                                @endif
                            </x-input.file-upload>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                            <x-label for="name" class="sm:mt-px sm:pt-2">{{ __('Industry') }} </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-input.select :items="$categories" wire:model.defer="selectedItem"></x-input.select>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
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

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                            <x-label for="phone" class="sm:mt-px sm:pt-2">{{ __('Phone') }} </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-input type="text" wire:model.defer="editing.phone" id="phone"  placeholder="Phone" class="max-w-lg w-full"/>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                            <x-label for="email" class="sm:mt-px sm:pt-2">{{ __('Email') }} </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <x-input type="email" wire:model.defer="editing.email" id="email"  placeholder="Email" class="max-w-lg w-full"/>
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
