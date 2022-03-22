<div>
    <div class="mt-4">

        <div class="relative flex-1 mb-4" x-data="{ show: true }">

            <input  wire:model="password" id="password" :type="show ? 'password' : 'text'" class="px-3 w-full py-2 bg-gray-200 border border-gray-200 rounded focus:border-gray-400 focus:outline-none focus:bg-white {{ $errors->has('password') ? ' border-red-500' : '' }}" name="password" required autocomplete="new-password" placeholder="Password">

            <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="show = !show" :class="{'hidden': !show, 'block': show }">
                <!-- Heroicon name: solid/eye-off -->
                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                    <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                </svg>
            </button>

            <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="show = !show" :class="{'block': !show, 'hidden': show }">
                <!-- Heroicon name: solid/eye -->
                <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        @if ($errors->has('password'))
            <p class="text-red-500 text-xs italic mt-4">
                {{ $errors->first('password') }}
            </p>
        @endif

        <div class="flex items-center place-content-end  mb-4">
            <button wire:click="generatePassword" class="btn-secondary py-2 px-3">Generate</button>
        </div>

        <span class="text-sm">
            <span class="font-semibold">Password strength:</span> {{ $strengthLevels[$strengthScore] ?? 'Weak' }}
        </span>

        <progress value="{{ $strengthScore }}" max="4" class="w-full mb-4"></progress>

        <input wire:model="password_confirmation" id="password-confirm" type="password" class="px-3 w-full py-2 bg-gray-200 border border-gray-200 rounded focus:border-gray-400 focus:outline-none focus:bg-white mb-4" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">


    </div>
</div>
