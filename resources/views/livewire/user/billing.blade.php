<div>
    <x-form-section submit="save" class="mt-8">

        <x-slot name="title">

            {{ __('Update Password') }}

        </x-slot>

        <x-slot name="description">

            {{ __('Ensure your account is using a long, random password to stay secure.') }}

        </x-slot>

        <x-slot name="form" class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            @if ($subscribed)
                <div class="col-span-6">
                    <label class="relative block bg-white border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none border-transparent">
                        <div class="flex items-center">
                            <img src="/images/plans/{{$plan->name}}.png" alt="{{ $plan->name }}" class="w-12 h-12 mr-3">
                            <div class="text-sm">
                                <p id="server-size-0-label" class="font-medium text-gray-900">Subscribed to {{ ucfirst($plan->name)  }} Plan</p>
                                <div id="server-size-0-description-0" class="text-gray-500">
                                    <p class="sm:inline">8GB / 4 CPUs</p>
                                    <span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>
                                    <p class="sm:inline">160 GB SSD disk</p>
                                </div>
                            </div>
                        </div>
                        <div id="server-size-0-description-1" class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                            <div class="font-medium text-gray-900">€ {{ $plan->price }}</div>
                            <div class="ml-1 text-gray-500 sm:ml-0">/mo</div>
                        </div>

                        <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                    </label>
                </div>



                <div class="col-span-6">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <button wire:click="$toggle('showSwitchModal')" type="button" class="inline-flex items-center shadow-sm px-4 py-1.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <!-- Heroicon name: solid/plus-sm -->
                                <svg class="-ml-1.5 mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                <span class="uppercase">Switch My Plan</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-span-6">
                    <p class="mt-1 max-w-2xl text-sm text-indigo-500">Your default payment method ends in <span class="font-bold text-indigo-500 underline">{{ auth()->user()->pm_last_four }}</span> .</p>
                    <p class="mt-1 text-xs text-gray-500">To update your default payment method, add a new card below:</p>
                </div>

                <div class="col-span-6">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="bg-white px-2 text-gray-500">
                              <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path fill="#6B7280" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                              </svg>
                            </span>
                        </div>
                    </div>

                </div>
            @endif

           <div class="col-span-6">

                <x-label for="card-holder-name"> {{__('Name on Card')}} </x-label>

                <x-input id="card-holder-name" type="text" class="mt-1 block w-full"/>

                <x-input-error for="card-holder-name" class="mt-2" />

            </div>

            <div class="col-span-6" wire:ignore>

                <x-label for="card-element" class="mb-5"> {{__('Credit Card')}} </x-label>

                <div id="card-element"></div>

                <div id="card-errors" class="mt-5 text-sm text-red-600"></div>

            </div>

           <div class="col-span-6">

               @if (!$subscribed)

                   <fieldset>
                        <legend class="text-base font-medium text-gray-900">Select a mailing list</legend>

                        <div class="space-y-4 mt-5">

                            @foreach($plans as $plan)

                                <label class="relative block bg-white border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none {{ $plan->id == $currentPlan ? ' border-indigo-500 ring-2 ring-indigo-500 border-transparent' : ' border-gray-300' }}">
                                        <input type="radio" wire:model="currentPlan" name="plan" value="{{$plan->id}}" class="sr-only">
                                        <div class="flex items-center">
                                            <img src="/images/plans/{{$plan->name}}.png" alt="{{ $plan->name }}" class="w-12 h-12 mr-3">
                                            <div class="text-sm">
                                                <p id="server-size-0-label" class="font-medium text-gray-900">{{ ucfirst($plan->name)  }} Plan</p>
                                                <div id="server-size-0-description-0" class="text-gray-500">
                                                    <p class="sm:inline">8GB / 4 CPUs</p>
                                                    <span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>
                                                    <p class="sm:inline">160 GB SSD disk</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="server-size-0-description-1" class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                            <div class="font-medium text-gray-900">€ {{ $plan->price }}</div>
                                            <div class="ml-1 text-gray-500 sm:ml-0">/mo</div>
                                        </div>

                                        <div class="absolute -inset-px rounded-lg border-2 pointer-events-none {{ $plan->id == $currentPlan ? ' border-indigo-500 border' : ' border-transparent' }}" aria-hidden="true"></div>
                                    </label>

                            @endforeach

                        </div>

                    </fieldset>

               @endif

          </div>

        </x-slot>

        <x-slot name="actions">

            <x-action-message class="mr-3" on="saved">

                {{ __('Saved.') }}

            </x-action-message>

            <x-button  data-secret="{{ $intent->client_secret }}" type="button" wire:loading.attr="disabled" id="card-button"> {{ __('Save') }}</x-button>

        </x-slot>

    </x-form-section>

    <form wire:submit.prevent="switch">
        <x-modal.dialog wire:model.defer="showSwitchModal">
            <x-slot name="title">Select a Plan</x-slot>

            <x-slot name="content">
                <div class="space-y-8 sm:space-y-5">
                    <div>
                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                            @foreach($plans as $plan)

                                <label class="relative block bg-white border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none {{ $plan->id == $currentPlan ? ' border-indigo-500 ring-2 ring-indigo-500 border-transparent' : ' border-gray-300' }}">
                                    <input type="radio" wire:model="currentPlan" name="plan" value="{{$plan->id}}" class="sr-only">
                                    <div class="flex items-center">
                                        <img src="/images/plans/{{$plan->name}}.png" alt="{{ $plan->name }}" class="w-12 h-12 mr-3">
                                        <div class="text-sm">
                                            <p id="server-size-0-label" class="font-medium text-gray-900">{{ ucfirst($plan->name)  }} Plan</p>
                                            <div id="server-size-0-description-0" class="text-gray-500">
                                                <p class="sm:inline">8GB / 4 CPUs</p>
                                                <span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>
                                                <p class="sm:inline">160 GB SSD disk</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="server-size-0-description-1" class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                        <div class="font-medium text-gray-900">€ {{ $plan->price }}</div>
                                        <div class="ml-1 text-gray-500 sm:ml-0">/mo</div>
                                    </div>

                                    <div class="absolute -inset-px rounded-lg border-2 pointer-events-none {{ $plan->id == $currentPlan ? ' border-indigo-500 border' : ' border-transparent' }}" aria-hidden="true"></div>
                                </label>

                            @endforeach
                        </div>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showSwitchModal', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button class="ml-3" wire:loading.attr="disabled">
                    {{ 'SWITCH PLAN' }}
                </x-button>
            </x-slot>
        </x-modal.dialog>
    </form>
</div>

@pushOnce('scripts')
<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('{{ env("STRIPE_KEY") }}');

    const elements = stripe.elements();

    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const cardError = document.getElementById('card-errors');
    const clientSecret = cardButton.dataset.secret;

    cardElement.addEventListener('change', function(event) {
        if (event.error) {
            cardError.textContent = event.error.message;
        } else {
            cardError.textContent = '';
        }
    });

    cardButton.addEventListener('click', async (e) => {
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: { name: cardHolderName.value }
                }
            }
        );

        if (error) {
            cardError.textContent = error.message;
            console.info(error)
        } else {
            @this.call('setPayment', setupIntent.payment_method)
        }
    });

</script>
@endPushOnce
