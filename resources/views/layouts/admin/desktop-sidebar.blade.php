<nav class="flex-1 pb-4 space-y-1">
    <x-sidebar-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
        <x-icon.home :active="request()->routeIs('admin.dashboard')"/>
        {{ __('Dashboard') }}
    </x-sidebar-link>

    <x-sidebar-link href="{{ route('admin.users') }}" :active="request()->routeIs('admin.users')">
        <x-icon.users :active="request()->routeIs('admin.users')"/>
        {{ __('Users') }}
    </x-sidebar-link>

    <x-sidebar-link href="{{ route('admin.companies') }}" :active="request()->routeIs('admin.companies')">
        <x-icon.folder :active="request()->routeIs('admin.companies')"/>
        {{ __('Companies') }}
    </x-sidebar-link>
</nav>
