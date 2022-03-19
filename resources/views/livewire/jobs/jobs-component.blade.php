<div class="">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul role="list" class="divide-y space-y-5 p-4 divide-gray-200">
            @forelse($rows as $row)
                <li class="relative">
                    <a href="{{ route('jobs.job', ['slug' => $row->slug]) }}" class="{{ $row->highlight_to ? 'bg-yellow-50 hover:border-yellow-400' : 'bg-white hover:bg-gray-50 hover:border-indigo-400'}} block shadow-lg hover:shadow-2xl hover:border-l-4 hover:-translate-y-2 hover:scale-y-105 ease-in-out delay-150 duration-300">
                        <div class="px-4 py-4 sm:px-6 space-y-5">
                            <div class="flex items-center justify-between">
                                <div class="text-sm font-medium truncate">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full" src="{{ $row->avatar_url }}" alt="{{ $row->name }}">
                                        </div>
                                        <div class="ml-4 space-y-1">
                                            <div class="font-medium text-indigo-600">{{ $row->name }}</div>
                                            <div class="flex items-center">
                                                <span class="font-medium text-gray-900">{{ $row->company ? $row->company->name : ''}}</span>
                                                <span class="{{ $row->company ? 'ml-1' : ''}} flex items-center">
                                                     <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 transition mr-1.5 h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                     <span class="text-gray-500">
                                                        {{ $row->created_at->diffForHumans() }}
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-2 flex-shrink-0 flex self-stretch">
                                    <p>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Full-time</span>
                                    </p>

                                </div>
                            </div>
                            <div class="mt-2 sm:flex text-justify text-gray-500">
                                {{  Str::limit($row->content, 400, ' ...') }}
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    @if($row->categories->first())
                                        <p class="flex items-center text-sm text-gray-500">
                                            <!-- Heroicon name: solid/users -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                                            </svg>
                                            {{ $row->categories->first()->name }}
                                        </p>
                                    @endif

                                    @if($row->country)
                                        <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                            <!-- Heroicon name: solid/location-marker -->
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                            </svg>
                                            {{ $row->country ? $row->country->name : ''}}
                                            {{ $row->city ? ', ' . $row->city->name : ''}}
                                            {{ $row->division ? ', ' . $row->division->name : ''}}
                                        </p>
                                    @endif
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                    <!-- Heroicon name: solid/calendar -->
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    <p>
                                        Closing on
                                        <time datetime="2020-01-14">{{ $row->closing_to ? $row->closing_to->format('d, M Y') : '' }}</time>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @if($row->urgent_to)
                        <span class="flex absolute h-4 w-4 top-0 right-0 -mt-1 -mr-1">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-sky-500"></span>
                        </span>
                    @endif
                </li>
            @empty
            @endforelse
        </ul>

        <div>
            {{ $rows->links('livewire::pagination-links') }}
        </div>
    </div>
</div>
