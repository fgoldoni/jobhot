<x-form-section submit="updateTeamName">
    <x-slot name="title">
        {{ __('Team Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The team\'s name and owner information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Team Owner Information -->
        <div class="col-span-6">
            <x-label value="{{ __('Team Owner') }}" />

            <div class="flex items-center mt-2">
                <img class="w-12 h-12 rounded-full object-cover" src="#igiuhiuhuhiouh" alt="iijoiho">

                <div class="ml-4 leading-tight">
                    <div>oihoi</div>
                    <div class="text-gray-700 text-sm">ouhuh</div>
                </div>
            </div>
        </div>

        <!-- Team Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Team Name') }}" />

            <x-input id="name"
                     type="text"
                     class="mt-1 block w-full" />

            <x-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
