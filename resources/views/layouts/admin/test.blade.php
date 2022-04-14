<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($rows as $row)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div>
                                            <span class="text-sm font-medium text-gray-900">{{ $row->name }}</span>
                                            @canImpersonate($guard = null)
                                            @canBeImpersonated($row, $guard = null)
                                            <a href="{{ route('impersonate', $row->id) }}" class="ml-1 text-xs text-indigo-500 hover:text-indigo-900 font-bold underline">impersonate <span aria-hidden="true">&rarr;</span></a>
                                            @endCanImpersonate
                                            @endCanImpersonate
                                        </div>

                                        <div class="text-sm text-gray-500">{{ $row->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Regional Paradigm Technician
                                </div>
                                <div class="text-sm text-gray-500">Optimization</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @foreach ($row->roles as $role)

                                    @if($role->name === 'Administrator')

                                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-pink-100 text-pink-800">

                                        <svg class="-ml-1 mr-1.5 h-2 w-2 text-pink-400" fill="currentColor" viewBox="0 0 8 8">

                                            <circle cx="4" cy="4" r="3" />

                                        </svg>

                                        {{ strtolower($role->name)  }}


                                    </span>
                                    @endif

                                    @if($role->name === 'Executive')
                                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-purple-100 text-purple-800">

                                        <svg class="-ml-1 mr-1.5 h-2 w-2 text-purple-400" fill="currentColor" viewBox="0 0 8 8">

                                            <circle cx="4" cy="4" r="3" />

                                        </svg>

                                        {{ strtolower($role->name)  }}

                                    </span>
                                    @endif

                                    @if($role->name === 'User')
                                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">

                                        <svg class="-ml-1 mr-1.5 h-2 w-2 text-indigo-400" fill="currentColor" viewBox="0 0 8 8">

                                            <circle cx="4" cy="4" r="3" />

                                        </svg>

                                        {{ strtolower($role->name)  }}

                                    </span>
                                    @endif

                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-gray-900">{{ $row->lastLogin?->logged_in_at->diffForHumans() }}</div>
                                <div class="text-green-700 hover:underline cursor-pointer">{{ $row->lastLogin?->logged_in_ip }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" wire:click="test" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="whitespace-nowrap" colspan="6">
                                acaca
                            </td>
                        </tr>
                    @endforelse

                    <!-- More people... -->
                    </tbody>
                </table>
                <div>
                    {{ $rows->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
