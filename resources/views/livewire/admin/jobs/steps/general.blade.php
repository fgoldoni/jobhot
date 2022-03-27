<x-form-section submit="updateProfileInformation" class="mt-8">

    <x-slot name="title">

        {{ __('Profile Information') }}

    </x-slot>

    <x-slot name="description">

        {{ __('Update your account\'s profile information and email address.') }}

    </x-slot>

    <x-slot name="form">

        <div class="col-span-6">

            <x-label for="name"> {{__('Name')}} </x-label>

            <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />

            <x-input-error for="name" class="mt-2" />

        </div>

        <div class="col-span-6">

            <x-label for="name"> {{__('Content')}} </x-label>

            <div wire:ignore>

                <textarea wire:model.debounce.9999999ms="state.content" data-content="@this" id="content" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                    {{ $model }}

                </textarea>

            </div>

            @error('state.content')

            <span class="text-sm text-red-500">{{ $message }}</span>

            @enderror

        </div>

        <div class="col-span-6"
             x-data="{ value: @entangle('state.closing_to_for_editing'), picker: undefined }"
             x-init="new Pikaday({ field: $refs.input, format: 'DD/MM/YYYY', onOpen() { this.setDate($refs.input.value) } })"
             x-on:change="value = $event.target.value">

            <x-label for="closing_to"> {{__('Expiration Date')}} </x-label>

            <x-input
                x-ref="input"
                x-bind:value="value"
                id="closing_to"
                type="text"
                class="mt-1 block w-full"
                autocomplete="closing_to"
            />

            <x-input-error for="state.closing_to_for_editing" class="mt-2" />

        </div>

    </x-slot>

    <x-slot name="actions">

        <x-action-message class="mr-3" on="saved">

            {{ __('Saved.') }}

        </x-action-message>

        <x-button primary wire:click="goToNextStep" spinner="goToNextStep" label="Next" wire:loading.attr="disabled"/>
    </x-slot>
</x-form-section>

@pushOnce('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set("state.content", editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endPushOnce
