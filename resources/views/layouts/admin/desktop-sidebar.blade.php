<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 pb-4 bg-white overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4 space-y-5">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="Workflow">
        </div>
        <div class="mt-5 flex-grow flex flex-col">
            <nav class="flex-1 bg-white space-y-1" aria-label="Sidebar">
                <!-- Current: "bg-indigo-50 border-indigo-600 text-indigo-600", Default: "border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->

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
        </div>
    </div>
</div>
