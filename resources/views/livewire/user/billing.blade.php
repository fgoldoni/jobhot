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
