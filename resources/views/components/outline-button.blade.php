<button class="relative w-full inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-indigo-500 group-hover:from-purple-600 group-hover:to-indigo-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:focus:ring-indigo-800">
      <span {{ $attributes->merge(['class' => 'uppercase w-full relative inline-flex px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0']) }}>
          {{ $slot }}
      </span>
</button>


