<div>
    <x-form-section submit="saveJobDetails" class="mt-8">

        <x-slot name="title">

            {{ __('Job Details') }}

        </x-slot>

        <x-slot name="description">

            {{ __('Update your Job Details.') }}

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

                <x-input-error for="avatar" class="mt-2" />

            </div>

            <div class="col-span-6">

                <x-label for="editing.name"> {{__('Name')}} </x-label>

                <x-input id="editing.name" type="text" class="mt-1 block w-full" wire:model.defer="editing.name"/>

                <x-input-error for="editing.name" class="mt-2" />

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
                <x-label for="state"> {{__('State')}} </x-label>
                <x-input.dot-select :items="$states" :selected="$selectedState" wire:model.defer="selectedState" wire:key="states-field-{{ $editing->id }}"></x-input.dot-select>
                <x-input-error for="state" class="mt-2" />
            </div>



        </x-slot>

        <x-slot name="actions">

            <x-action-message class="mr-3" on="saved">

                {{ __('Saved.') }}

            </x-action-message>

            <x-button wire:loading.attr="disabled"> {{ __('Save') }}</x-button>
        </x-slot>
    </x-form-section>

    <x-form-section submit="saveCompany" class="mt-8">

        <x-slot name="title">

            {{ __('Company Information') }}

        </x-slot>

        <x-slot name="description">

            {{ __('Update your Company Information.') }}

        </x-slot>

        <x-slot name="form" class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="col-span-6">

                <x-label for="editing.company_id"> {{__('Company')}} </x-label>

                <x-input.company-select :items="$companies" :selected="$editing->company_id" wire:model.defer="editing.company_id" wire:key="companies-field-{{ $editing->id }}"></x-input.company-select>

                <x-input-error for="editing.company_id" class="mt-2" />

            </div>

            <div class="col-span-6">

                <x-label for="industry"> {{__('Industry')}} </x-label>

                <x-input.select :items="$industries" :selected="$industry" wire:model.defer="industry" wire:key="categories-field-industries-{{ $editing->id }}"></x-input.select>

                <x-input-error for="industry" class="mt-2" />

            </div>

        </x-slot>

        <x-slot name="actions">

            <x-action-message class="mr-3" on="saved">

                {{ __('Saved.') }}

            </x-action-message>

            <x-button wire:loading.attr="disabled"> {{ __('Save') }}</x-button>
        </x-slot>
    </x-form-section>

    <x-form-section submit="saveJobLocation" class="mt-8">

        <x-slot name="title">

            {{ __('Job Location') }}

        </x-slot>

        <x-slot name="description">

            {{ __('Update your Job Location.') }}

        </x-slot>

        <x-slot name="form" class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="col-span-6">
                <x-label for="countries"> {{__('Countries')}} </x-label>
                <x-input.admin-countries-select :items="$countries" wire:model="editing.country_id" wire:key="search-countries"></x-input.admin-countries-select>
                @if ($errors->has('editing.country_id'))
                    <p class="mt-2 text-sm text-red-600">{{ $errors->first('editing.country_id') }}</p>
                @endif
            </div>

            @if($showCityField)
                <div class="col-span-6">
                    <x-label for="cities"> {{__('Cities')}} </x-label>
                    <x-input.admin-cities-select :items="$cities" wire:model="editing.city_id" wire:key="search-cities"></x-input.admin-cities-select>
                    @if ($errors->has('editing.city_id'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('editing.city_id') }}</p>
                    @endif
                </div>
            @else
                <div class="col-span-6">
                    <x-label for="divisions"> {{__('Division')}} </x-label>
                    <x-input.admin-divisions-select :items="$divisions" wire:model="editing.division_id" wire:key="search-divisions"></x-input.admin-divisions-select>
                    @if ($errors->has('editing.division_id'))
                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('editing.division_id') }}</p>
                    @endif
                </div>
            @endif

            <div class="col-span-6">

                <x-label for="iframe"> {{__('iFrame')}} </x-label>

                <x-input.textarea id="iframe" wire:model.defer="editing.iframe" rows="3"></x-input.textarea>

                <x-input-error for="editing.iframe" class="mt-2" />

            </div>

        </x-slot>

        <x-slot name="actions">

            <x-action-message class="mr-3" on="saved">

                {{ __('Saved.') }}

            </x-action-message>

            <x-button wire:loading.attr="disabled"> {{ __('Save') }}</x-button>
        </x-slot>
    </x-form-section>

    <x-form-section submit="saveJobAttribute" class="mt-8">

        <x-slot name="title">

            {{ __('Job Attributes') }}

        </x-slot>

        <x-slot name="description">

            {{ __('Update your Job Attributes.') }}

        </x-slot>

        <x-slot name="form" class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">


            <div class="col-span-6 sm:col-span-3">

                <x-label for="selectedItem"> {{__('Functional Area')}} </x-label>

                <x-input.select :items="$areas" :selected="$selectedItem" wire:model.defer="selectedItem" wire:key="categories-field-{{ $editing->id }}"></x-input.select>

                <x-input-error for="selectedItem" class="mt-2" />

            </div>

            <div class="col-span-6 sm:col-span-3">

                <x-label for="jobType"> {{__('Job Type') }} </x-label>

                <x-input.select :items="$jobTypes" :selected="$jobType" wire:model.defer="jobType" wire:key="categories-field-jobType-{{ $editing->id }}"></x-input.select>

                <x-input-error for="jobType" class="mt-2" />

            </div>

            <div class="col-span-6 sm:col-span-3">

                <x-label for="gender"> {{__('Gender')}} </x-label>

                <x-input.select :items="$genders" :selected="$gender" wire:model.defer="gender" wire:key="categories-field-gender-{{ $editing->id }}"></x-input.select>

                <x-input-error for="gender" class="mt-2" />

            </div>

            <div class="col-span-6 sm:col-span-3">

                <x-label for="jobLevel"> {{__('Required Degree Level')}} </x-label>

                <x-input.select :items="$jobLevels" :selected="$jobLevel" wire:model.defer="jobLevel" wire:key="categories-field-jobLevel-{{ $editing->id }}"></x-input.select>

                <x-input-error for="jobLevel" class="mt-2" />

            </div>

        </x-slot>

        <x-slot name="actions">

            <x-action-message class="mr-3" on="saved">

                {{ __('Saved.') }}

            </x-action-message>

            <x-button wire:loading.attr="disabled"> {{ __('Save') }}</x-button>
        </x-slot>
    </x-form-section>

    <x-form-section submit="save" class="mt-8">

        <x-slot name="title">

            {{ __('Make your Job Premium') }}

        </x-slot>

        <x-slot name="description">

            {{ __('Update your Plan.') }}

        </x-slot>

        <x-slot name="form" class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="col-span-6 px-4">
                <fieldset>
                    <legend class="sr-only">Pricing plans</legend>
                    <div class="relative bg-white rounded-md -space-y-px">
                        <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                        <label class="rounded-tl-md rounded-tr-md relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6 md:grid md:grid-cols-3 focus:outline-none">
                            <div class="flex items-center text-sm">
                                <input type="radio" name="pricing-plan" value="Startup" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-0-label" aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
                                <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                <span id="pricing-plans-0-label" class="ml-3 font-medium">Startup</span>
                            </div>
                            <p id="pricing-plans-0-description-0" class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                                <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                <span class="font-medium">$29 / mo</span>
                                <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                                <span>($290 / yr)</span>
                            </p>
                            <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                            <p id="pricing-plans-0-description-1" class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-right">Up to 5 active job postings</p>
                        </label>

                        <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                        <label class="relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6 md:grid md:grid-cols-3 focus:outline-none">
                            <div class="flex items-center text-sm">
                                <input type="radio" name="pricing-plan" value="Business" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-1-label" aria-describedby="pricing-plans-1-description-0 pricing-plans-1-description-1">
                                <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                <span id="pricing-plans-1-label" class="ml-3 font-medium">Business</span>
                            </div>
                            <p id="pricing-plans-1-description-0" class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                                <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                <span class="font-medium">$99 / mo</span>
                                <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                                <span>($990 / yr)</span>
                            </p>
                            <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                            <p id="pricing-plans-1-description-1" class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-right">Up to 25 active job postings</p>
                        </label>

                        <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                        <label class="rounded-bl-md rounded-br-md relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6 md:grid md:grid-cols-3 focus:outline-none">
                            <div class="flex items-center text-sm">
                                <input type="radio" name="pricing-plan" value="Enterprise" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-2-label" aria-describedby="pricing-plans-2-description-0 pricing-plans-2-description-1">
                                <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                <span id="pricing-plans-2-label" class="ml-3 font-medium">Enterprise</span>
                            </div>
                            <p id="pricing-plans-2-description-0" class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-center">
                                <!-- Checked: "text-indigo-900", Not Checked: "text-gray-900" -->
                                <span class="font-medium">$249 / mo</span>
                                <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                                <span>($2490 / yr)</span>
                            </p>
                            <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                            <p id="pricing-plans-2-description-1" class="ml-6 pl-1 text-sm md:ml-0 md:pl-0 md:text-right">Unlimited active job postings</p>
                        </label>
                    </div>
                </fieldset>
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
