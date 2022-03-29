<x-form-section submit="save" class="mt-8">

    <x-slot name="title">

        {{ __('Profile Information') }}

    </x-slot>

    <x-slot name="description">

        {{ __('Update your account\'s profile information and email address.') }}

    </x-slot>

    <x-slot name="form" class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

        <div class="col-span-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $companies->count() }}</h3>
            <p class="mt-1 text-sm text-gray-500">Use a permanent address where you can receive mail.</p>
        </div>

        <div class="col-span-6">

            <x-label for="editing.name"> {{__('Name')}} </x-label>

            <x-input id="editing.name" type="text" class="mt-1 block w-full" wire:model.defer="editing.name"/>

            <x-input-error for="editing.name" class="mt-2" />

        </div>

        <div class="col-span-6">

            <x-label for="editing.company_id"> {{__('Company')}} </x-label>

            <x-input.company-select :items="$companies" :selected="$editing->company_id" wire:model.defer="editing.company_id" wire:key="companies-field-{{ $editing->id }}"></x-input.company-select>

            <x-input-error for="editing.company_id" class="mt-2" />

        </div>

        <div class="col-span-6">

            <x-label for="content"> {{__('Content')}} </x-label>

            <div wire:ignore>

                <textarea wire:model.debounce.9999999ms="editing.content" data-content="@this" id="content" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                    {{ $editing->content }}

                </textarea>

            </div>

            <x-input-error for="editing.content" class="mt-2" />

        </div>

        <div class="col-span-6 sm:col-span-3"
             x-data="{ value: @entangle('editing.closing_to_for_editing'), picker: undefined }"
             x-init="new Pikaday({ field: $refs.input, format: 'DD/MM/YYYY', onOpen() { this.setDate($refs.input.value) } })"
             x-on:change="value = $event.target.value">
            <x-label for="closing_to"> {{__('Expiration Date')}} </x-label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <x-input
                    x-ref="input"
                    x-bind:value="value"
                    id="closing_to"
                    type="text"
                    class="mt-1 block w-full  pr-10"
                    autocomplete="closing_to"
                />

                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <!-- Heroicon name: solid/question-mark-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <x-input-error for="editing.closing_to_for_editing" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-label for="experience"> {{__('Experience')}} </x-label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <x-input id="experience" type="text" class="mt-1 block w-full pr-12" wire:model.defer="editing.experience"/>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm" id="price-currency"> YEAR(S) </span>
                </div>
            </div>
            <x-input-error for="editing.experience" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-label for="salary_min"> {{__('Salary (Min)')}} </x-label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <x-input id="salary_min" type="text" class="mt-1 block w-full pr-12" wire:model.defer="editing.salary_min"/>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <!-- Heroicon name: solid/question-mark-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <x-input-error for="editing.salary_min" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-label for="salary_min"> {{__('Salary (Max)')}} </x-label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <x-input id="salary_max" type="text" class="mt-1 block w-full pr-12" wire:model.defer="editing.salary_max"/>
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <!-- Heroicon name: solid/question-mark-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <x-input-error for="editing.salary_max" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-label for="salary_type"> {{__('Salary Type')}} </x-label>
            <x-input.select :items="$salaryTypes" wire:model="selectedSalaryType" :selected="$selectedSalaryType" wire:key="search-salary_type"></x-input.select>
            <x-input-error for="editing.salary_type" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-label for="negotiable"> {{__('Negotiable Salary')}} </x-label>
            @livewire('admin.toggle-component', ['model' => $editing, 'field' => 'negotiable'], key('negotiable' . $editing->id))
            <x-input-error for="editing.negotiable" class="mt-2" />
        </div>

        <div class="col-span-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Job Location</h3>
            <p class="mt-1 text-sm text-gray-500">Use a permanent address where you can receive mail.</p>
        </div>


        <div class="col-span-6 sm:col-span-3">
            <x-label for="name"> {{__('Countries')}} </x-label>
            <x-input.admin-countries-select :items="$countries" wire:model="editing.country_id" wire:key="search-countries"></x-input.admin-countries-select>
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-label for="name"> {{__('Countries')}} </x-label>
            <x-input.admin-countries-select :items="$countries" wire:model="editing.country_id" wire:key="search-countries"></x-input.admin-countries-select>
        </div>

    </x-slot>

    <x-slot name="actions">

        <x-action-message class="mr-3" on="saved">

            {{ __('Saved.') }}

        </x-action-message>

        <x-button wire:loading.attr="disabled"> {{ __('Save') }}</x-button>
    </x-slot>
</x-form-section>

@pushOnce('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set("editing.content", editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endPushOnce
