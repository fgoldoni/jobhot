<div class="text-gray-900 bg-gray-200  text-sm shadow">
    <nav class="text-gray-900 px-4 py-2 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            {{ $slot }}
        </div>
        <div class="flex items-center space-x-5 text-gray-900 text-gray-600">
            {{ $actions }}
        </div>
    </nav>
</div>
