<!-- Modal -->
<div x-data="robotSearch" class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input x-model="query" type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button @click="search" type="button" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
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
                                            <a :href="robot.detail_link">
                                                <h1 class="h2" x-text="robot.name"></h1>
                                            </a>
                                            <p x-text="robot.description"></p>
                                            <p class="h3 py-2" x-text="robot.price"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </template>
            </ul>
        </form>
    </div>
</div>

<script>
    const robotSearch = {
        query: '',
        robots: [],
        async search() {
            const params = {
                q: this.query
            };
            const resp = await axios.get('/api/search', { params });

            this.robots = resp.data;
        }
    }
</script>
