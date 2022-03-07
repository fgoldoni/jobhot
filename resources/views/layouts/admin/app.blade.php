<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/operator-mono" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased h-full">
<div x-data="{ open: false }" @keydown.window.escape="open = false">
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div x-show="open" x-cloak class="fixed inset-0 flex z-40 md:hidden" role="dialog" aria-modal="true">
        <!--
          Off-canvas menu overlay, show/hide based on off-canvas menu state.

          Entering: "transition-opacity ease-linear duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "transition-opacity ease-linear duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div  x-show="open"
              x-cloak
              x-transition:enter="transition-opacity ease-linear duration-300"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave="transition-opacity ease-linear duration-300"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
              @click="open = false"
              class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

        <!--
          Off-canvas menu, show/hide based on off-canvas menu state.

          Entering: "transition ease-in-out duration-300 transform"
            From: "-translate-x-full"
            To: "translate-x-0"
          Leaving: "transition ease-in-out duration-300 transform"
            From: "translate-x-0"
            To: "-translate-x-full"
        -->
        <div  x-show="open"
              x-cloak
              x-transition:enter="transition ease-in-out duration-300 transform"
              x-transition:enter-start="-translate-x-full"
              x-transition:enter-end="translate-x-0"
              x-transition:leave="transition ease-in-out duration-300 transform"
              x-transition:leave-start="translate-x-0"
              x-transition:leave-end="-translate-x-full"
              class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
            <!--
              Close button, show/hide based on off-canvas menu state.

              Entering: "ease-in-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "ease-in-out duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div
                x-show="open"
                x-cloak
                x-transition:enter="ease-in-out duration-300"
                x-transition:enter-start=opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in-out duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute top-0 right-0 -mr-12 pt-2">
                <button @click="open = false" type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Close sidebar</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                <div class="flex-shrink-0 flex items-center px-4">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="Workflow">
                </div>

                @include('layouts.admin.mobile-sidebar')
            </div>

            <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                <a href="#" class="flex-shrink-0 group block">
                    <div class="flex items-center">
                        <div>
                            <p class="text-base font-medium text-gray-700 group-hover:text-gray-900">JobHot by Goldoni</p>
                            <p class="text-sm font-medium text-gray-500 group-hover:text-gray-700">Version: 1.0</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="flex-shrink-0 w-14" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white">
            <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-4">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="Workflow">
                </div>
                @include('layouts.admin.desktop-sidebar')
            </div>

            <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                <a href="#" class="flex-shrink-0 w-full group block">
                    <div class="flex items-center">
                        <div>
                            <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">JobHot by Goldoni</p>
                            <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">Version: 1.0</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="md:pl-64 flex flex-col flex-1">
        <x-banner></x-banner>
        <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
            <button @click="open = true" type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                <span class="sr-only">Open sidebar</span>
                <!-- Heroicon name: outline/menu-alt-2 -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
            @include('layouts.admin.navigation')
        </div>

        <main class="flex-1">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    {{ $header }}
                </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-4">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
</div>

    @livewireScripts
    <script src="https://unpkg.com/moment"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>

    @stack('scripts')
</body>
</html>
