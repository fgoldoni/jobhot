<div>
    <x-action-section>
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Permanently delete your account.') }}
        </x-slot>

        <x-slot name="content">
            <div class="inline-block min-w-full py-2 align-middle">

                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-300">

                        <thead class="bg-gray-50">

                        <tr>

                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>

                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Total</th>

                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Download</span>
                            </th>

                        </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-200 bg-white">

                        @forelse (auth()->user()->invoices() as $invoice)

                            <tr>

                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $invoice->date()->toFormattedDateString() }}</td>

                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $invoice->total() }}</td>

                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="{{ route('invoice', $invoice->id) }}" class="text-indigo-600 hover:text-indigo-900 underline">download</a>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="flex justify-center items-center space-x-2">
                                        <x-icon.inbox class="h-8 w-8 text-gray-400" />
                                        <span class="font-medium py-8 text-gray-400 text-xl">No items found...</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </x-slot>
    </x-action-section>

</div>

