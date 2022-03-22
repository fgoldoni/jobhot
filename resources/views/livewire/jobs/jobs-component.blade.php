<section>
    <div>
        <div x-data="{ open: false, openFilters: false , openSidebar: false }" @keydown.window.escape="open = false">

            <x-jobs.filter-mobile-section></x-jobs.filter-mobile-section>


            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <x-jobs.jobs-top-bar :rows="$rows" :areas="$areas" :industries="$industries" :filters="$filters" wire:model="filters.categories"></x-jobs.jobs-top-bar>

                <section aria-labelledby="products-heading" class="pt-6 pb-24">

                    <h2 id="products-heading" class="sr-only">Products</h2>

                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-8 gap-y-10">

                        <x-jobs.filter-section class="hidden bg-white p-5 lg:block"></x-jobs.filter-section>

                        <div class="lg:col-span-3">
                            <x-jobs.jobs-list :rows="$rows"></x-jobs.jobs-list>
                        </div>

                    </div>

                </section>
            </main>
        </div>
    </div>
</section>
