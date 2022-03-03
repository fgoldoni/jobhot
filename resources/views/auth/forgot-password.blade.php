<x-guest-layout>
    <div class="flex h-screen bg-gray-200 p-4 rotate">
        <div class="sm:max-w-xl md:max-w-2xl w-full m-auto">
            @if (session('status'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <!-- Heroicon name: solid/exclamation -->
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700">
                                {{ session('status') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="flex items-stretch bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-indigo-500 sm:border-0">
                @csrf

                <div class="flex hidden overflow-hidden relative sm:block w-5/12 md:w-6/12 bg-gray-600 text-gray-300 py-4 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1477346611705-65d1883cee1e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80')">
                    <div class="flex-1 absolute bottom-0 text-white p-10">
                        <h3 class="text-2xl font-bold inline-block">Reset Password</h3>
                        <p class="text-gray-500 whitespace-no-wrap">
                            Forgotten Password? No prob!
                        </p>
                    </div>
                    <svg class="absolute animate h-full w-4/12 sm:w-2/12 right-0 inset-y-0 fill-current text-white" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <polygon points="0,0 100,100 100,0"></polygon>
                    </svg>
                </div>
                <div class="flex-1 p-6 sm:p-10 sm:py-12">
                    <h3 class="text-xl text-gray-700 font-bold mb-6">
                        Enter <span class="text-gray-400 font-light">your email below</span></h3>

                    <input id="email" type="email" class="px-3 w-full py-2 bg-gray-200 border border-gray-200 rounded focus:border-gray-400 focus:outline-none focus:bg-white mb-4 {{ $errors->has('email') ? ' border-red' : '' }}" name="email" value="" required placeholder="Email Address">

                    @if ($errors->has('email'))
                        <p class="text-red-500 text-xs italic mb-4">
                            {{ $errors->first('email') }}
                        </p>
                    @endif


                    <div class="flex flex-wrap items-center">
                        <div class="w-full sm:flex-1">
                            <input type="submit" value="Email Password Reset Link" class="w-full sm:w-auto bg-indigo-500 text-indigo-100 px-6 py-2 rounded hover:bg-indigo-600 focus:outline-none cursor-pointer">
                        </div>
                    </div>

                    <p class="w-full text-normal text-left text-grey-dark mt-8">
                        <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                            Back to login
                        </a>
                    </p>

                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
