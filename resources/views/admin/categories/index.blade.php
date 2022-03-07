<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900">Categories</h1>
    </x-slot>

    <!-- Replace with your content -->
    @livewire('admin.categories-component')

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    @endpush
</x-admin-layout>
