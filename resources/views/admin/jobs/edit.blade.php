<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
    </x-slot>

    <!-- Replace with your content -->
    @livewire('admin.jobs.job-form', ['editing' => $job])
</x-admin-layout>
