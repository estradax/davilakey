import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.store('cart', {
    items: [],
    add(id) {
        this.items.push(id);
    },
    delete(id) {
        const filtered = this.items.filter((xid) => xid !== id);
        this.items = filtered;
    },
    setItems(items) {
        this.items = items;
    }
});

Alpine.start();
