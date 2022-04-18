<div>
    <x-form-section submit="save" class="mt-8">

        <x-slot name="title">

            {{ __('Update Password') }}

        </x-slot>

        <x-slot name="description">

            {{ __('Ensure your account is using a long, random password to stay secure.') }}

        </x-slot>

        <x-slot name="form" class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="col-span-6">

                <x-label for="current_password"> {{__('Current Password')}} </x-label>

                <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="current_password"/>

                <x-input-error for="current_password" class="mt-2" />

            </div>

            <div class="col-span-6">

                <x-label for="password"> {{__('New Password')}} </x-label>

                <x-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="password"/>

                <x-input-error for="password" class="mt-2" />

            </div>  <div class="col-span-6">

                <x-label for="password_confirmation"> {{__('Confirm Password')}} </x-label>

                <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="password_confirmation"/>

                <x-input-error for="password_confirmation" class="mt-2" />

            </div>

        </x-slot>

        <x-slot name="actions">

            <x-action-message class="mr-3" on="saved">

                {{ __('Saved.') }}

            </x-action-message>

            <x-button wire:loading.attr="disabled"> {{ __('Save') }}</x-button>

        </x-slot>

    </x-form-section>

    <x-form-section submit="deleteOtherSession" class="mt-8">

        <x-slot name="title">

            {{ __('Browser Sessions') }}

        </x-slot>

        <x-slot name="description">

            {{ __('Manage and log out your active sessions on other browsers and devices.') }}

        </x-slot>

        <x-slot name="form" class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="col-span-6">

                <ul role="list" class="divide-y divide-gray-200">

                    @foreach ($browserSessions as $session)

                        <li class="px-4 py-4 sm:px-0">

                            <div class="flex space-x-3">

                                @if ($session->agent->is_desktop)

                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>

                                @else

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>

                                @endif

                                <div class="flex-1 space-y-1">

                                    <div class="flex items-center space-x-2">

                                        <h3 class="text-sm font-medium font-sans text-gray-600">

                                            {{ $session->agent->platform  }} - {{ $session->agent->browser }}

                                        </h3>

                                        @if($session->is_current_device)

                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">

                                            <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">

                                                <circle cx="4" cy="4" r="3"></circle>

                                            </svg>

                                            This device

                                        </span>

                                        @endif


                                    </div>

                                    <p class="text-xs text-gray-500 font-sans">

                                        {{ $session->ip_address }} • {{ $session->last_active }}

                                    </p>

                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>


        </x-slot>

        <x-slot name="actions">

            <x-action-message class="mr-3" on="saved">

                {{ __('Saved.') }}

            </x-action-message>

            <x-button type="button" wire:loading.attr="disabled" wire:click="showDeleteOtherSession()"> {{ __('Log Out Other Browser Sessions') }}</x-button>

        </x-slot>

    </x-form-section>

    <form wire:submit.prevent="deleteOtherSession">

        <x-modal.dialog wire:model.defer="showDeleteOtherSessionModal">

            <x-slot name="title">Log Out Other Browser Sessions</x-slot>

            <x-slot name="content">

                <div class="space-y-8 sm:space-y-5">

                    <div>

                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">

                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center border-t border-gray-200 sm:pt-5">

                                <x-label for="session_password" class="sm:mt-px sm:pt-2">{{ __('Current Password') }} </x-label>

                                <div class="mt-1 sm:mt-0 sm:col-span-2">

                                    <x-input type="password" wire:model.defer="session_password" id="session_password"  placeholder="Current Password" class="max-w-lg w-full"/>

                                    @if ($errors->has('session_password'))

                                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('session_password') }}</p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showDeleteOtherSessionModal', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button class="ml-3" wire:loading.attr="disabled">
                    {{ 'Save' }}
                </x-button>
            </x-slot>
        </x-modal.dialog>
    </form>


</div>
