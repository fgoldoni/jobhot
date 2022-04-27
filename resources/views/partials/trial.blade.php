@if(auth()->user()->onTrial())
    <!-- This example requires Tailwind CSS v2.0+ -->

    <div class="col-span-6">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-teal-50 border-l-4 border-teal-400 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <!-- Heroicon name: solid/exclamation -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-teal-800">You are on Trial Period for the {{ auth()->user()->plan?->name }} Plan</h3>
                    <div class="mt-2 text-sm text-teal-700">
                        <p>You have {{  auth()->user()->trial_ends_at->diffInDays(now()) }} days left on your trial.</p>
                    </div>

                    @isset($actions)

                        <div class="mt-4">

                            <div class="-mx-2 -my-1.5 flex">


                                <a href="{{ route('settings.billing') }}" class="bg-teal-50 px-2 py-1.5 rounded-md text-sm font-medium text-teal-800 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600">Upgrade Account</a>

                            </div>

                        </div>

                    @endisset
                </div>
            </div>
        </div>
    </div>
@endif
