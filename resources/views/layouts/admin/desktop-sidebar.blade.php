<nav class="mt-5 flex-1 bg-white space-y-8">
    <div class="space-y-1">
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
    </div>

    <div class="space-y-1">
        <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="projects-headline">Projects</h3>
        <div class="space-y-1" role="group" aria-labelledby="projects-headline">
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
        </div>
        <div class="space-y-1" x-data="{ open: false }">
            <!-- Current: "bg-gray-100 text-gray-900", Default: "bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
            <button @click="open = !open" type="button" class="bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md" aria-controls="sub-menu-5" aria-expanded="false">
                <!-- Heroicon name: outline/chart-bar -->
                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <span class="flex-1"> Reports </span>
                <!-- Expanded: "text-gray-400 rotate-90", Collapsed: "text-gray-300" -->
                <svg
                    :class="{ 'text-gray-400 rotate-90': open, 'text-gray-300': !(open) }"
                    class="ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
                </svg>
            </button>
            <!-- Expandable link section, show/hide based on state. -->
            <div class="space-y-1" id="sub-menu-5" x-show="open" x-cloak>
                <x-sidebar-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                    <x-icon.home :active="request()->routeIs('admin.dashboard')"/>
                    {{ __('Dashboard') }}
                </x-sidebar-link>
                <a href="#" class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50"> Overview </a>

                <a href="#" class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50"> Members </a>

                <a href="#" class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50"> Calendar </a>

                <a href="#" class="group w-full flex items-center pl-11 pr-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50"> Settings </a>
            </div>
        </div>
    </div>
</nav>
