<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!-- Background color split screen for large screens -->
<div class="fixed top-0 left-0 w-1/2 h-full bg-white" aria-hidden="true"></div>
<div class="fixed top-0 right-0 w-1/2 h-full bg-gray-50" aria-hidden="true"></div>
<div class="relative min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="flex-shrink-0 bg-indigo-600">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <!-- Logo section -->
                <div class="flex items-center px-2 lg:px-0 xl:w-64">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-300.svg" alt="Workflow">
                    </div>
                </div>

                <!-- Search section -->
                <div class="flex-1 flex justify-center lg:justify-end">
                    <div class="w-full px-2 lg:px-6">
                        <label for="search" class="sr-only">Search projects</label>
                        <div class="relative text-indigo-200 focus-within:text-gray-400">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/search -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input id="search" name="search" class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-md leading-5 bg-indigo-400 bg-opacity-25 text-indigo-100 placeholder-indigo-200 focus:outline-none focus:bg-white focus:ring-0 focus:placeholder-gray-400 focus:text-gray-900 sm:text-sm" placeholder="Search projects" type="search">
                        </div>
                    </div>
                </div>
                <div class="flex lg:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" class="bg-indigo-600 inline-flex items-center justify-center p-2 rounded-md text-indigo-400 hover:text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-600 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!--
                          Icon when menu is closed.

                          Heroicon name: outline/menu-alt-1

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                        <!--
                          Icon when menu is open.

                          Heroicon name: outline/x

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Links section -->
                <div class="hidden lg:block lg:w-80">
                    <div class="flex items-center justify-end">
                        <div class="flex">
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-indigo-200 hover:text-white">Documentation</a>
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-indigo-200 hover:text-white">Support</a>
                        </div>
                        <!-- Profile dropdown -->
                        <div class="ml-4 relative flex-shrink-0">
                            <div>
                                <button type="button" class="bg-indigo-700 flex text-sm rounded-full text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=256&h=256&q=80" alt="">
                                </button>
                            </div>

                            <!--
                              Dropdown menu, show/hide based on menu state.

                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div class="origin-top-right absolute z-10 right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">View Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="lg:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-indigo-800">Dashboard</a>
                <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-indigo-200 hover:text-indigo-100 hover:bg-indigo-600">Support</a>
            </div>
            <div class="pt-4 pb-3 border-t border-indigo-800">
                <div class="px-2">
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-indigo-200 hover:text-indigo-100 hover:bg-indigo-600">Your Profile</a>
                    <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-indigo-200 hover:text-indigo-100 hover:bg-indigo-600">Settings</a>
                    <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-indigo-200 hover:text-indigo-100 hover:bg-indigo-600">Sign out</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- 3 column wrapper -->
    <div class="flex-grow w-full max-w-7xl mx-auto xl:px-8 lg:flex">
        <!-- Left sidebar & main wrapper -->
        <div class="flex-1 min-w-0 bg-white xl:flex">
            <div class="border-b border-gray-200 xl:border-b-0 xl:flex-shrink-0 xl:w-64 xl:border-r xl:border-gray-200 bg-white">
                <div class="h-full pl-4 pr-6 py-6 sm:pl-6 lg:pl-8 xl:pl-0">
                    <!-- Start left column area -->
                    <div class="h-full relative" style="min-height: 12rem">
                        <div class="absolute inset-0 border-2 border-gray-200 border-dashed rounded-lg"></div>
                    </div>
                    <!-- End left column area -->
                </div>
            </div>

            <div class="bg-white lg:min-w-0 lg:flex-1">
                <div class="h-full py-6 px-4 sm:px-6 lg:px-8">
                    <!-- Start main area-->
                    <div class="relative h-full" style="min-height: 36rem">
                        <div class="absolute inset-0 border-2 border-gray-200 border-dashed rounded-lg"></div>
                    </div>
                    <!-- End main area -->
                </div>
            </div>
        </div>

        <div class="bg-gray-50 pr-4 sm:pr-6 lg:pr-8 lg:flex-shrink-0 lg:border-l lg:border-gray-200 xl:pr-0">
            <div class="h-full pl-6 py-6 lg:w-80">
                <!-- Start right column area -->
                <div class="h-full relative" style="min-height: 16rem">
                    <div class="absolute inset-0 border-2 border-gray-200 border-dashed rounded-lg"></div>
                </div>
                <!-- End right column area -->
            </div>
        </div>
    </div>
</div>
