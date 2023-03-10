<!-- Modal -->
<div
    x-data="cart"
    class="modal fade bg-white" id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-content modal-body border-0 p-0">
            <div x-show="showCheckoutButton" class="mb-3">
                <a class="w-100 btn btn-primary" href="{{ route('checkout.index') }}">Checkout</a>
            </div>
            <ul style="list-style-type: none; margin: 0; padding: 0">
                <template x-for="robot in robots">
                <li>
            <div class="container pb-5" style="height: auto !important;">
                <div class="row" style="height: 100% !important; align-items: center;">
                    <div class="col-lg-2" style="height: 100% !important;">
                        <div class="card" style="height: 100% !important;">
                            <img style="height: 100% !important;" class="card-img img-fluid" x-bind:src="robot.image_url" alt="Card image cap" id="product-detail">
                        </div>
                    </div>
                    <!-- col end -->
                    <div class="col-lg-7" style="height: 100% !important;">
                        <div class="card" style="height: 100% !important;">
                            <div class="card-body" style="height: 100% !important;">
                                <h1 class="h2" x-text="robot.name"></h1>
                                <p class="h3 py-2" x-text="robot.price"></p>
                                <button class="btn btn-danger" @click="cancelRobot(robot.id)">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </li>
                </template>

            </ul>
        </div>
    </div>
</div>

<script>
    const cart = {
        robots: [],
        showCheckoutButton: false,
        async fetchCartDetail(ids) {
            const params = { ids };
            const resp = await axios.get('/api/cart-detail', { params });

            return resp.data;
        },
        async init() {
            this.$watch('$store.cart.items', async () => {
                const items = Alpine.store('cart').items;
                this.showCheckoutButton = items.length > 0;
                this.robots = await this.fetchCartDetail(JSON.stringify(items));
            });

            const ids = localStorage.getItem('robot_ids');
            if (!ids) return;

            const items = JSON.parse(ids);
            if (items.length > 0) {
                this.showCheckoutButton = true;
            }

            Alpine.store('cart').setItems(items);
            this.robots = await this.fetchCartDetail(ids);
        },
        cancelRobot(id) {
            Alpine.store('cart').delete(id);

            const ids = Alpine.store('cart').items;

            localStorage.setItem('robot_ids', JSON.stringify(ids));
        }
    }
</script>
