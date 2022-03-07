let root = document.querySelector('[drag-root]')

root.querySelectorAll('[drag-item]').forEach(el => {
    el.addEventListener('dragstart', e => {
        e.target.setAttribute('dragging', true)
    })

    el.addEventListener('drop', e => {
        //e.target.classList.remove('bg-yellow-900')

        let draggingEl = root.querySelector('[dragging]')

        e.target.before(draggingEl)

        // Refresh the livewire component
        let component = Livewire.find(
            e.target.closest('[wire\\:id]').getAttribute('wire:id')
        )

        let orderIds = Array.from(root.querySelectorAll('[drag-item]'))
            .map(itemEl => itemEl.getAttribute('drag-item'))

        let method = root.getAttribute('drag-root')

        component.call(method, orderIds)
    })

    el.addEventListener('dragenter', e => {
        e.target.classList.add('bg-gray-900')

        e.preventDefault()
    })

    el.addEventListener('dragover', e => e.preventDefault())

    el.addEventListener('dragleave', e => {
        //e.target.classList.remove('bg-yellow-900')
    })

    el.addEventListener('dragend', e => {
        e.target.removeAttribute('dragging')
    })
})
