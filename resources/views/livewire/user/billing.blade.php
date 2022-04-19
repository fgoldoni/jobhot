<div>
    <x-form-section submit="save" class="mt-8">

        <x-slot name="title">

            {{ __('Update Password') }}

        </x-slot>

        <x-slot name="description">

            {{ __('Ensure your account is using a long, random password to stay secure.') }}

        </x-slot>

        <x-slot name="form" class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

            @if (auth()->user()->subscribed())
                <div class="col-span-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Thanks for being a subscriber</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Your default payment method ends in <span class="text-indigo-500">{{ auth()->user()->pm_last_four }}</span> .</p>
                </div>
            @endif

            <div class="col-span-6">

                <!-- This example requires Tailwind CSS v2.0+ -->
                <fieldset>
                    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-4">
                        <!--
                          Checked: "border-transparent", Not Checked: "border-gray-300"
                          Active: "border-indigo-500 ring-2 ring-indigo-500"
                        -->
                        <label class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                            <input type="radio" name="project-type" value="Newsletter" class="sr-only" aria-labelledby="project-type-0-label" aria-describedby="project-type-0-description-0 project-type-0-description-1">
                            <div class="flex-1 flex">
                                <div class="flex flex-col">
                                    <span id="project-type-0-label" class="block text-sm font-medium text-gray-900"> Newsletter </span>
                                    <span id="project-type-0-description-0" class="mt-1 flex items-center text-sm text-gray-500"> Last message sent an hour ago </span>
                                    <span id="project-type-0-description-1" class="mt-6 text-sm font-medium text-gray-900"> 621 users </span>
                                </div>
                            </div>
                            <!--
                              Not Checked: "invisible"

                              Heroicon name: solid/check-circle
                            -->
                            <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                            <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                        </label>

                        <!--
                          Checked: "border-transparent", Not Checked: "border-gray-300"
                          Active: "border-indigo-500 ring-2 ring-indigo-500"
                        -->
                        <label class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                            <input type="radio" name="project-type" value="Existing Customers" class="sr-only" aria-labelledby="project-type-1-label" aria-describedby="project-type-1-description-0 project-type-1-description-1">
                            <div class="flex-1 flex">
                                <div class="flex flex-col">
                                    <span id="project-type-1-label" class="block text-sm font-medium text-gray-900"> Existing Customers </span>
                                    <span id="project-type-1-description-0" class="mt-1 flex items-center text-sm text-gray-500"> Last message sent 2 weeks ago </span>
                                    <span id="project-type-1-description-1" class="mt-6 text-sm font-medium text-gray-900"> 1200 users </span>
                                </div>
                            </div>
                            <!--
                              Not Checked: "invisible"

                              Heroicon name: solid/check-circle
                            -->
                            <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                            <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                        </label>

                        <!--
                          Checked: "border-transparent", Not Checked: "border-gray-300"
                          Active: "border-indigo-500 ring-2 ring-indigo-500"
                        -->
                        <label class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                            <input type="radio" name="project-type" value="Trial Users" class="sr-only" aria-labelledby="project-type-2-label" aria-describedby="project-type-2-description-0 project-type-2-description-1">
                            <div class="flex-1 flex">
                                <div class="flex flex-col">
                                    <span id="project-type-2-label" class="block text-sm font-medium text-gray-900"> Trial Users </span>
                                    <span id="project-type-2-description-0" class="mt-1 flex items-center text-sm text-gray-500"> Last message sent 4 days ago </span>
                                    <span id="project-type-2-description-1" class="mt-6 text-sm font-medium text-gray-900"> 2740 users </span>
                                </div>
                            </div>
                            <!--
                              Not Checked: "invisible"

                              Heroicon name: solid/check-circle
                            -->
                            <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <!--
                              Active: "border", Not Active: "border-2"
                              Checked: "border-indigo-500", Not Checked: "border-transparent"
                            -->
                            <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                        </label>
                    </div>
                </fieldset>


            </div>

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

        </x-slot>

        <x-slot name="actions">

            <x-action-message class="mr-3" on="saved">

                {{ __('Saved.') }}

            </x-action-message>

            <x-button  data-secret="{{ auth()->user()->createSetupIntent()->client_secret }}" type="button" wire:loading.attr="disabled" id="card-button"> {{ __('Save') }}</x-button>

        </x-slot>

    </x-form-section>
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
