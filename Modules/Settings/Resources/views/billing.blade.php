<x-guest-layout>

    <main class="flex-1 mt-8">

        <div class="relative max-w-7xl mx-auto md:px-8 xl:px-0">

            <div class="pt-10 pb-16">

                <div class="px-4 sm:px-6 md:px-0">

                    <h1 class="text-3xl font-extrabold text-gray-900">Password</h1>

                </div>

                <div class="px-4 sm:px-6 md:px-0">

                    <div class="py-6">

                        <div class="lg:hidden">

                            <label for="selected-tab" class="sr-only">Select a tab</label>

                            <select id="selected-tab" name="selected-tab" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                                <option selected>General</option>

                                <option>Password</option>

                                <option>Notifications</option>

                                <option>Plan</option>

                                <option>Billing</option>

                                <option>Team Members</option>
                            </select>

                        </div>

                        <x-user.settings--navigation></x-user.settings--navigation>

                        @livewire('user.billing')

                    </div>

                </div>

            </div>

        </div>

    </main>


</x-guest-layout>

