<div class="">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="shadow overflow-hidden">
        <ul role="list" class="divide-y space-y-5 p-4 divide-gray-200">
            @forelse($rows as $row)
                <li>
                    <a href="#" class="block bg-white shadow-lg hover:bg-gray-50 hover:shadow-2xl hover:border-l-4 hover:border-indigo-400 hover:-translate-y-2 hover:scale-y-105 hover:bg-indigo-500 ease-in-out delay-150 duration-300">
                        <div class="px-4 py-4 sm:px-6 space-y-5">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </div>
                                    <div class="ml-4 text-sm">
                                        <div class="flex text-sm">
                                            <p class="font-medium text-indigo-600 truncate">{{ $row->name }}</p>
                                        </div>
                                        <div class="flex items-center text-sm flex-shrink-0">
                                            <p class="font-medium text-gray-900 truncate">{{ $row->company ? $row->company->name : ''}}</p>
                                            <p class="ml-1 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 transition mr-1.5 h-4 w-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <span class="truncate text-gray-700">{{ $row->country ? 'in ' . $row->country->name : ''}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-2 flex flex-shrink-0 self-stretch">
                                    <div>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Full-time</span>
                                    </div>
                                </div>
                            </div>
                            <p class="flex text-justify text-gray-500 mt-2">
                                lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut, molestiae perspiciatis porro quis vel vero? Aliquam explicabo maxime neque non odit provident, quasi rerum sunt suscipit ut veritatis voluptatibus.
                                lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut, molestiae perspiciatis porro quis vel vero? Aliquam explicabo maxime neque non odit provident, quasi rerum sunt suscipit ut veritatis voluptatibus.
                            </p>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <p class="flex items-center text-sm text-gray-500">
                                        <!-- Heroicon name: solid/users -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                        Engineering
                                    </p>
                                    <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                        <!-- Heroicon name: solid/location-marker -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                        Remote
                                    </p>
                                </div>

                                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                    <!-- Heroicon name: solid/calendar -->
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    <p>
                                        Closing on
                                        <time datetime="2020-01-07">January 7, 2020</time>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @empty
            @endforelse
        </ul>

        <div>
            {{ $rows->links('livewire::pagination-links') }}
        </div>
    </div>

</div>
