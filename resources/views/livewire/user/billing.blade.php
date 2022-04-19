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

                <x-label for="card-holder-name"> {{__('Name on Card')}} </x-label>

                <x-input id="card-holder-name" type="text" class="mt-1 block w-full"/>

                <x-input-error for="card-holder-name" class="mt-2" />

            </div>

            <div class="col-span-6">

                <x-label for="card-element" class="mb-5"> {{__('Credit Card')}} </x-label>

                <div id="card-element" class="block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md"></div>

                <x-input-error for="card-element" class="mt-2" />

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
    const clientSecret = cardButton.dataset.secret;

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
            // Display "error.message" to the user...
        } else {
            @this.call('setPayment', setupIntent.payment_method)
        }
    });

</script>
@endPushOnce
