document.addEventListener('alpine:init', () => {

    Alpine.data('tabs', (defaultTab) => ({
        tab: defaultTab,
        toggleTab (tab) {
            this.tab = tab;
        },
        isActive (tab) {
            return this.tab === tab;
        }
    }))
})
