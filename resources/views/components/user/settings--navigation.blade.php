<div class="hidden lg:block">
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-x-8">
            <x-nav-setting-link href="{{ route('settings') }}" :active="request()->routeIs('settings')">
                {{ __('Settings') }}
            </x-nav-setting-link>

            <x-nav-setting-link href="{{ route('settings.password') }}" :active="request()->routeIs('settings.password')">
                {{ __('Password') }}
            </x-nav-setting-link>

            @if(auth()->user()->hasRole(\App\Models\User::Executive))

                <x-nav-setting-link href="{{ route('settings.billing') }}" :active="request()->routeIs('settings.billing')">
                    {{ __('Billing') }}
                </x-nav-setting-link>

                <x-nav-setting-link href="{{ route('settings.invoices') }}" :active="request()->routeIs('settings.invoices')">
                    {{ __('Invoices') }}
                </x-nav-setting-link>

            @endif
        </nav>
    </div>
</div>
