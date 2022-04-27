@foreach($plans as $plan)

    <label class="relative block bg-white border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none {{ $plan->id == $currentPlan ? ' border-indigo-500 ring-2 ring-indigo-500 border-transparent' : ' border-gray-300' }}">
        <input type="radio" wire:model="currentPlan" name="plan" value="{{$plan->id}}" class="sr-only">
        <div class="flex items-center">
            <img src="/images/plans/{{$plan->name}}.png" alt="{{ $plan->name }}" class="w-12 h-12 mr-3">
            <div class="text-sm">
                <p id="server-size-0-label" class="font-medium text-gray-900">{{ ucfirst($plan->name)  }} Plan</p>
                <div id="server-size-0-description-0" class="text-gray-500">
                    <p class="sm:inline">8GB / 4 CPUs</p>
                    <span class="hidden sm:inline sm:mx-1" aria-hidden="true">&middot;</span>
                    <p class="sm:inline">160 GB SSD disk</p>
                </div>
            </div>
        </div>
        <div id="server-size-0-description-1" class="mt-2 flex text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
            <div class="font-medium text-gray-900">€ {{ $plan->price }}</div>
            <div class="ml-1 text-gray-500 sm:ml-0">/mo</div>
        </div>

        <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
    </label>

@endforeach
