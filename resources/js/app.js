import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.store('cart', {
    items: [],
    add(id) {
        this.items.push(id);
    },
    setItems(items) {
        this.items = items;
    }
});

Alpine.start();
