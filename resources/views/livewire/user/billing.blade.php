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
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Thanks for being a subscriber</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Your default payment method ends in <span class="text-indigo-500">{{ auth()->user()->pm_last_four }}</span> .</p>
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

                    <fieldset x-data="{ initialCheckedIndex: 0, value: 1, active: 1 }" x-init='{let t=Array.from(document.querySelectorAll("input"));this.value=t[e]?.value;for(let e of t)e.addEventListener("change",(()=>{this.active=e.value})),e.addEventListener("focus",(()=>{this.active=e.value}'>
                        <legend class="text-base font-medium text-gray-900">Select a mailing list</legend>

                        <div class="space-y-4 mt-5">
                            @foreach($plans as $plan)
                                <!--
                                  Checked: "border-transparent", Not Checked: "border-gray-300"
                                  Active: "border-indigo-500 ring-2 ring-indigo-500"
                                -->
                                <label class="relative block bg-white border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none"
                                       :class="{ 'border-transparent': (value === {{$plan->id}}), 'border-gray-300': !(value === {{$plan->id}}), 'border-indigo-500 ring-2 ring-indigo-500': (active === {{$plan->id}}), 'undefined': !(active === {{$plan->id}}) }">
                                    <input type="radio" x-model="value" name="plan" value="{{$plan->id}}" class="sr-only">
                                        <div class="flex items-center">
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
                                            <div class="font-medium text-gray-900">$40</div>
                                            <div class="ml-1 text-gray-500 sm:ml-0">/mo</div>
                                        </div>
                                        <!--
                                          Active: "border", Not Active: "border-2"
                                          Checked: "border-indigo-500", Not Checked: "border-transparent"
                                        -->
                                        <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                                    </label>
                            @endforeach
                        </div>

                    </fieldset>

                </div>

        </x-slot>

        <x-slot name="actions">

            <x-action-message class="mr-3" on="saved">

                {{ __('Saved.') }}

            </x-action-message>

            <x-button  data-secret="{{ $intent->client_secret }}" type="button" wire:loading.attr="disabled" id="card-button"> {{ __('Save') }}</x-button>

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
