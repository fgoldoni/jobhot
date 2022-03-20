@props(['heightMin' => '24', 'heightMax' => '32'])

@php
    $heightMin = 'py-' . $heightMin;
    $heightMax = 'lg:py-' . $heightMax;
@endphp


<section class="relative" style="background-image: url('https://cdn.devdojo.com/images/february2021/directory-bg.jpg')">
    <div class="absolute inset-0 bg-gradient-to-b from-black to-transparent opacity-30"></div>

    <div class="relative z-20 px-4 {{ $heightMin }} mx-auto text-center text-white max-w-7xl {{ $heightMax }}">
        <div class="flex flex-wrap text-white">
            <div class="relative w-full px-4 mx-auto text-center xl:flex-grow-0 xl:flex-shrink-0">

                <h1 class="mt-0 mb-2 text-4xl font-bold text-white sm:text-5xl lg:text-7xl">Search Directory</h1>
                <p class="mt-0 mb-4 text-base text-white sm:text-lg lg:text-xl">
                    Find the best places to eat, drink, and shop nearest to you.
                </p>

            </div>
        </div>
    </div>

    @livewire('home.search-bar')


</section>
