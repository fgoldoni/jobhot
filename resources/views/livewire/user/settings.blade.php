<div>
    <x-form-section submit="save" class="mt-8">

        <x-slot name="title">

            {{ __('Profile Info') }}

        </x-slot>

        <x-slot name="description">

            {{ __('Update your basic profile information such as Email Address, Name, and Image.') }}

        </x-slot>

        <x-slot name="form" class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="col-span-6">

                <x-label for="avatar"> {{__('Avatar')}} </x-label>

                <x-input.file-upload wire:model="avatar" id="avatar" error="{{ $errors->first('avatar') }}">
                    @if ($avatar)
                        <img src="{{ $avatar->temporaryUrl() }}" alt="Avatar">
                    @else
                        <img src="{{ $editing->avatar_url }}" alt="Avatar">
                    @endif
                </x-input.file-upload>

            </div>

            <div class="col-span-6">

                <x-label for="editing.name"> {{__('Name')}} </x-label>

                <x-input id="editing.name" type="text" class="mt-1 block w-full" wire:model.defer="editing.name"/>

                <x-input-error for="editing.name" class="mt-2" />

            </div>


            <div class="col-span-6">

                <x-label for="editing.email"> {{__('Email')}} </x-label>

                <x-input id="editing.email" type="email" class="mt-1 block w-full" wire:model.defer="editing.email" required/>

                <x-input-error for="editing.email" class="mt-2" />

            </div>


        </x-slot>

        <x-slot name="actions">

            <x-action-message class="mr-3" on="saved">

                {{ __('Saved.') }}

            </x-action-message>

            <x-button wire:loading.attr="disabled"> {{ __('Save') }}</x-button>

        </x-slot>

    </x-form-section>
</div>
