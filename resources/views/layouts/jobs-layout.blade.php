<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.2.3/dist/trix.css">

    <!-- Scripts -->
    <script src="{{ asset('js/alpine.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div class="font-sans bg-gray-100 text-gray-900 antialiased">
    <section>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-jobs.jobs-navigation-menu></x-jobs.jobs-navigation-menu>
    </section>

    {{ $slot }}

    @livewire('footer')
</div>

@livewireScripts
<script src="https://unpkg.com/moment" ></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js" ></script>
<script src="https://unpkg.com/trix@1.2.3/dist/trix.js" ></script>
<script src="https://unpkg.com/taggle/src/taggle.js" ></script>

@stack('scripts')
</body>
</html>
