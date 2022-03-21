<section>
    <div>
        <div x-data="{ open: false, openFilters: false }" @keydown.window.escape="open = false">
            <!--
              Mobile filter dialog

              Off-canvas filters for mobile, show/hide based on off-canvas filters state.
            -->
            <x-jobs.filter-mobile-section></x-jobs.filter-mobile-section>


            <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <x-jobs.jobs-top-bar :rows="$rows" :areas="$areas" :industries="$industries" :filters="$filters" wire:model="filters.category"></x-jobs.jobs-top-bar>

                <section aria-labelledby="products-heading" class="pt-6 pb-24">
                    <h2 id="products-heading" class="sr-only">Products</h2>

                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-8 gap-y-10">
                        <!-- Filters -->
                        <x-jobs.filter-section :countries="$countries" :cities="$cities"></x-jobs.filter-section>


                        <!-- Product grid -->
                        <div class="lg:col-span-3">
                            <!-- Replace with your content -->
                                <x-jobs-list :rows="$rows"></x-jobs-list>
                            <!-- /End replace -->
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</section>
