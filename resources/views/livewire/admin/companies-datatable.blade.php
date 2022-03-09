<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Users</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add user</button>
        </div>
    </div>
    <div class="mt-8 flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
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
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full" src="{{ $row->avatar_url }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-medium text-gray-900">{{ $row->name }}</div>
                                        <div class="text-gray-500">{{ $row->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                @foreach ($row->categories as $category)
                                    <p class="flex items-center text-gray-500">
                                        <x-icon.solid type="{{$category->icon}}" class="mr-1.5 h-5 w-5 text-gray-600"/>

                                        <span class="truncate text-gray-900">{{ $category->name }}</span>
                                    </p>
                                @endforeach
                               <div class="text-gray-500">{{ $row->phone }}</div>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <div class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5 m-1 cursor-pointer">
                                    <div class="absolute flex-shrink-0 flex items-center justify-center">
                                        <span class="h-1.5 w-1.5 rounded-full
                                            {{ $row->state->value === 'draft' ? ' bg-rose-500' : '' }}
                                            {{ $row->state->value === 'published' ? ' bg-green-500' : '' }}
                                            {{ $row->state->value === 'archived' ? ' bg-gray-500' : '' }}
                                            {{ $row->state->value === 'hold' ? ' bg-amber-500' : '' }}"
                                            aria-hidden="true">
                                        </span>
                                    </div>
                                    <div class="ml-3.5 font-medium text-gray-500">{{ ucfirst($row->state->value) }}</div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $row->created_at->diffForHumans() }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <x-dropdown align="right" width="w-32">
                                    <x-slot name="trigger">
                                        <button type="button" class="bg-gray-100 rounded-full flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            <span class="sr-only">Open options</span>
                                            <!-- Heroicon name: solid/dots-vertical -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link wire:click="edit({{ $row->id }})" class="group flex items-center cursor-pointer">
                                            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                            </svg>
                                            Edit
                                        </x-dropdown-link>

                                        <x-dropdown-link href="{{ route('impersonate', $row->id) }}" class="group flex items-center">
                                            <!-- Heroicon name: solid/user-add -->
                                            <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                            </svg>
                                            {{ __('Login As') }}
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>
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

    <!-- Save Company Modal -->
    @include('admin.companies.save-company-modal')
</div>
</div>
@push('scripts')

@endpush
