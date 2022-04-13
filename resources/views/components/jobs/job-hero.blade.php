@props(['job'])

<section>
    <div>

        <div>
            <img class="h-32 w-full object-cover lg:h-48" src="{{ $job->company->avatar_url }}" alt="{{ $job->company->name }}">
        </div>

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">

            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">

                <div class="flex">

                    <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32" src="{{ $job->avatar_url }}" alt="{{ $job->name }}">

                </div>

                <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">

                    <div class="sm:hidden md:block mt-6 min-w-0 flex-1">

                        <h1 class="text-2xl font-bold text-gray-900 truncate">{{ $job->company->name }}</h1>

                    </div>

                    <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">

                        <button type="button" class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">

                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>

                            <span>{{ $job->company->email }}</span>

                        </button>

                        <button type="button" class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">

                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>

                            <span>{{ $job->company->phone }}</span>

                        </button>

                    </div>

                </div>

            </div>

            <div class="hidden sm:block md:hidden mt-6 min-w-0 flex-1">

                <h1 class="text-2xl font-bold text-gray-900 truncate">Ricardo Cooper</h1>

            </div>
        </div>
    </div>

</section>
