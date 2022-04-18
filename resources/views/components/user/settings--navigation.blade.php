<div class="hidden lg:block">
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-x-8">
            <x-nav-setting-link href="{{ route('settings') }}" :active="request()->routeIs('settings')">
                {{ __('Settings') }}
            </x-nav-setting-link>

            <x-nav-setting-link href="{{ route('settings.password') }}" :active="request()->routeIs('settings.password')">
                {{ __('Password') }}
            </x-nav-setting-link>

            <x-nav-setting-link href="{{ route('settings.password') }}" :active="request()->routeIs('settings.password')">
                {{ __('Notifications') }}
            </x-nav-setting-link>


            <x-nav-setting-link href="{{ route('settings.password') }}" :active="request()->routeIs('settings.password')">
                {{ __('Password') }}
            </x-nav-setting-link>


            <x-nav-setting-link href="{{ route('settings.password') }}" :active="request()->routeIs('settings.password')">
                {{ __('Plan') }}
            </x-nav-setting-link>

            <x-nav-setting-link href="{{ route('settings.password') }}" :active="request()->routeIs('settings.password')">
                {{ __('Billing') }}
            </x-nav-setting-link>

            <x-nav-setting-link href="{{ route('settings.password') }}" :active="request()->routeIs('settings.password')">
                {{ __('Team Members') }}
            </x-nav-setting-link>
        </nav>
    </div>
</div>
