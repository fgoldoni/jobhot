<x-guest-layout>

    <x-jobs.job-hero :job="$job"></x-jobs.job-hero>

    <main class="py-10">

        <!-- Page header -->

        <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
            <div class="flex-1 min-w-0">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center space-x-4">
                        <li>
                            <div class="flex">
                                <a href="{{ url('/') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">
                                    <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="hidden md:flex items-center">
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                                    {{ $job->categories->firstWhere('type', \App\Enums\CategoryType::Industry)?->name }}
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <!-- Heroicon name: solid/chevron-right -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                                    {{ $job->categories->firstWhere('type', \App\Enums\CategoryType::Area)?->name }}
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h2 class="mt-2 text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    {{ $job->name }}
                </h2>
                <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                    @if($job->urgent)

                        <div class="mt-2 inline">
                            <!-- Heroicon name: solid/briefcase -->
                            <a href="#" class="relative inline-flex items-center rounded-full animate-pulse border border-rose-300 px-3 py-0.5">
                                <div class="absolute flex-shrink-0 flex items-center justify-center">
                                    <span class="h-1.5 w-1.5 rounded-full bg-rose-500" aria-hidden="true"></span>
                                </div>
                                <div class="ml-3.5 text-sm font-medium text-rose-500">Urgent</div>
                            </a>
                        </div>

                    @endif


                    <div class="mt-2 inline">
                        <!-- Heroicon name: solid/briefcase -->
                        <a href="#" class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div class="ml-3.5 text-sm font-medium text-gray-500">{{ $job->city_id ? $job->city->name : $job->division->name }}, {{ $job->country->name }}</div>
                        </a>
                    </div>

                    <div class="mt-2 inline">
                        <!-- Heroicon name: solid/briefcase -->
                        <a href="#" class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div class="ml-3.5 text-sm font-medium text-gray-500">
                                Closing on  {{ $job->closing_to_formatted }}
                            </div>
                        </a>
                    </div>

                    <div class="mt-2 inline">
                            <!-- Heroicon name: solid/briefcase -->
                            <a href="#" class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <div class="ml-3.5 text-sm font-medium text-gray-500">
                                   {{ $job->view_count }}
                                </div>
                            </a>
                        </div>
                </div>
            </div>
            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                <span class="sm:ml-3">
                     <x-button>
                        <svg class="-ml-1 mr-3 h-5 w-5 text-white group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Apply Now
                    </x-button>
                </span>
            </div>
        </div>


        <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
            <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                <!-- Description list-->
                <section aria-labelledby="applicant-information-title">
                    <div class="bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">Applicant Information</h2>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Employment Status</dt>
                                    <dd class="mt-1 text-sm">
                                        <div class="flex items-center space-x-2">
                                            <!-- Heroicon name: solid/lock-open -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-indigo-700 text-sm font-medium">{{ $job->categories->firstWhere('type', \App\Enums\CategoryType::JobType)?->name }}</span>
                                        </div>
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Job Level</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <div class="flex items-center space-x-2">
                                            <!-- Heroicon name: solid/lock-open -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                            </svg>
                                            <span class="text-indigo-700 text-sm font-medium">{{ $job->categories->firstWhere('type', \App\Enums\CategoryType::JobLevel)?->name }}</span>
                                        </div>
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Gender</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <div class="flex items-center space-x-2">
                                            <!-- Heroicon name: solid/lock-open -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="text-indigo-700 text-sm font-medium">
                                                {{ $job->categories->firstWhere('type', \App\Enums\CategoryType::Gender)?->name }}
                                            </span>
                                        </div>
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Experience</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <div class="flex items-center space-x-2">
                                            <!-- Heroicon name: solid/lock-open -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                            </svg>
                                            <span class="text-indigo-700 text-sm font-medium">
                                                {{ $job->experience }} Year
                                            </span>
                                        </div>
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Salary</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <div class="flex items-center space-x-2">
                                            <!-- Heroicon name: solid/lock-open -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="text-indigo-700 text-sm font-medium">
                                                ${{ $job->salary_min }} – ${{ $job->salary_max }}
                                            </span>
                                            @if($job->negotiable)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800">
                                                  <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
                                                    <circle cx="4" cy="4" r="3" />
                                                  </svg>
                                                  Negotiable
                                                </span>
                                            @endif
                                        </div>
                                    </dd>
                                </div>


                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Salary Period</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <div class="flex items-center space-x-2">
                                            <!-- Heroicon name: solid/lock-open -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-indigo-700 text-sm font-medium">
                                                {{ ucfirst($job->salary_type->value) }}
                                            </span>
                                        </div>
                                    </dd>
                                </div>

                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Published on</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <div class="flex items-center space-x-2">
                                            <!-- Heroicon name: solid/lock-open -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="text-indigo-700 text-sm font-medium">
                                                {{ $job->live_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </dd>
                                </div>

                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Job Id </dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        <div class="flex items-center space-x-2">
                                            <!-- Heroicon name: solid/lock-open -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                            </svg>
                                            <span class="text-indigo-700 text-sm font-medium">
                                                {{ $job->id }}
                                            </span>
                                        </div>
                                    </dd>
                                </div>

                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Job Description</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        {!! $job->content !!}
                                    </dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Responsibilities</dt>
                                    <dd class="mt-1 text-gray-700">
                                        <ul role="list">
                                            @foreach($job->categories->where('type', '=', \App\Enums\CategoryType::Responsibility)->all() as $category)
                                                <li class="pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <!-- Heroicon name: solid/paper-clip -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0 text-sm"> {{ $category->name }} </span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </dd>
                                </div>

                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Skills & Qualifications</dt>
                                    <dd class="mt-1 text-sm text-gray-700">
                                        <ul role="list">
                                            @foreach($job->categories->where('type', '=', \App\Enums\CategoryType::Skill)->all() as $category)
                                                <li class="pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <!-- Heroicon name: solid/paper-clip -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0 text-sm"> {{ $category->name }} </span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </dd>
                                </div>

                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Benefits</dt>
                                    <dd class="mt-1 text-sm text-gray-700">
                                        <ul role="list">
                                            @foreach($job->categories->where('type', '=', \App\Enums\CategoryType::Benefit)->all() as $category)
                                                <li class="pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <!-- Heroicon name: solid/paper-clip -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0 text-sm"> {{ $category->name }} </span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <div>
                            <a href="#" class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg">Apply Now</a>
                        </div>
                    </div>
                </section>

                <!-- Comments-->
                <section aria-labelledby="notes-title">
                    <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
                        <div class="divide-y divide-gray-200">
                            <div class="px-4 py-5 sm:px-6">
                                <h2 id="notes-title" class="text-lg font-medium text-gray-900">Related Jobs</h2>
                            </div>
                            <div class="px-4 py-6 sm:px-6">
                                <ul role="list" class="divide-y space-y-5 p-4 divide-gray-200">
                                    @forelse($rows as $row)
                                        <x-jobs.item :row="$row" wire:key="item-{{$row->id}}"></x-jobs.item>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                    <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Tips for candidates</h2>

                    <!-- Activity Feed -->
                    <div class="mt-6 flow-root">
                        <ul role="list" class="-mb-8">
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                      <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                        <!-- Heroicon name: solid/check -->
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                      </span>
                                        </div>
                                        <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                            <div>
                                                <p class="text-sm text-gray-500">Check if the offer matches your profile</p>
                                            </div>
                                            <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                <time datetime="2020-09-20">#1</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                      <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                        <!-- Heroicon name: solid/check -->
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                      </span>
                                        </div>
                                        <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                            <div>
                                                <p class="text-sm text-gray-500">Check the closing date</p>
                                            </div>
                                            <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                <time datetime="2020-09-22">#2</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="relative pb-8">
                                    <div class="relative flex space-x-3">
                                        <div>
                      <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                        <!-- Heroicon name: solid/check -->
                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                      </span>
                                        </div>
                                        <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                            <div>
                                                <p class="text-sm text-gray-500">Meet the employer in a professional location</p>
                                            </div>
                                            <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                <time datetime="2020-10-04">#3</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-6 flex flex-col justify-stretch">
                        <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Get started</button>
                    </div>
                    <div class="mt-6 flex items-center justify-center">
                        {!! $job->iframe !!}
                    </div>
                </div>
            </section>
        </div>
    </main>



    <!-- Section 6 -->
    <section>
        <footer class="bg-white" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
                <div class="pb-8 xl:grid xl:grid-cols-5 xl:gap-8">
                    <div class="grid grid-cols-2 gap-8 xl:col-span-4">
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Solutions</h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Marketing </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Analytics </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Commerce </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Insights </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Support</h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Pricing </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Documentation </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Guides </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> API Status </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Company</h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> About </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Blog </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Jobs </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Press </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Partners </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Legal</h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Claim </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Privacy </a>
                                    </li>

                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900"> Terms </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 xl:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Language &amp; Currency</h3>
                        <form class="mt-4 sm:max-w-xs">
                            <fieldset class="w-full">
                                <label for="language" class="sr-only">Language</label>
                                <div class="relative">
                                    <select id="language" name="language" class="appearance-none block w-full bg-none bg-white border border-gray-300 rounded-md py-2 pl-3 pr-10 text-base text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected>English</option>
                                        <option>French</option>
                                        <option>German</option>
                                        <option>Japanese</option>
                                        <option>Spanish</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 px-2 flex items-center">
                                        <!-- Heroicon name: solid/chevron-down -->
                                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="mt-4 w-full">
                                <label for="currency" class="sr-only">Currency</label>
                                <div class="relative">
                                    <select id="currency" name="currency" class="appearance-none block w-full bg-none bg-white border border-gray-300 rounded-md py-2 pl-3 pr-10 text-base text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option>ARS</option>
                                        <option selected>AUD</option>
                                        <option>CAD</option>
                                        <option>CHF</option>
                                        <option>EUR</option>
                                        <option>GBP</option>
                                        <option>JPY</option>
                                        <option>USD</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 px-2 flex items-center">
                                        <!-- Heroicon name: solid/chevron-down -->
                                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-8 lg:flex lg:items-center lg:justify-between xl:mt-0">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Subscribe to our newsletter</h3>
                        <p class="mt-2 text-base text-gray-500">The latest news, articles, and resources, sent to your inbox weekly.</p>
                    </div>
                    <form class="mt-4 sm:flex sm:max-w-md lg:mt-0">
                        <label for="email-address" class="sr-only">Email address</label>
                        <input type="email" name="email-address" id="email-address" autocomplete="email" required class="appearance-none min-w-0 w-full bg-white border border-gray-300 py-2 px-4 text-base rounded-md text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:placeholder-gray-400 sm:max-w-xs" placeholder="Enter your email">
                        <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                            <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Subscribe</button>
                        </div>
                    </form>
                </div>
                <div class="mt-8 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-between">
                    <div class="flex space-x-6 md:order-2">
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>

                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>

                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>

                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">GitHub</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                            </svg>
                        </a>

                        <a href="#" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">Dribbble</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">&copy; 2020 Workflow, Inc. All rights reserved.</p>
                </div>
            </div>
        </footer>

    </section>


</x-guest-layout>
