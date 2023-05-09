@extends('layouts.shell')

@section('shell.content')

    <!-- Open Content -->
    <section x-data="shopSingle" class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        @php
                            $robotImageUrl = \CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary::getImage($robot->fetchFirstMedia()->getFilename())
                                ->delivery(\Cloudinary\Transformation\Delivery::quality(\Cloudinary\Transformation\Quality::auto()))->toUrl();
                        @endphp
                        <img style="width: 100% !important; margin-left: 0 !important; max-width: 100% !important; height: 600px !important; object-fit: cover !important;" class="card-img img-fluid" src="{{ $robotImageUrl }}" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">
                                @foreach($robot->subImages->chunk(3) as $subImageChunk)
                                    <div class="carousel-item @if($loop->first) active @endif">
                                        <div class="row">
                                            @foreach($subImageChunk as $subImage)
                                                <div class="col-4">
                                                    <a href="#">
                                                        <img style="margin-left: 0 !important; width: 100% !important; object-fit: cover !important; max-width: 100% !important; height: 200px !important;" class="card-img img-fluid" src="{{ $subImage->image_url }}" alt="Product Image 1">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $robot->name }}</h1>
                            <p class="h3 py-2">${{ number_format($robot->price, 2) }}</p>

                            <h6>Description:</h6>
                            <p>{{ $robot->description }}</p>

                            <h6>Specification:</h6>
                            <ul class="list-unstyled pb-3">
                                @foreach($robot->specs as $spec)
                                    <li>{{ $spec->content }}</li>
                                @endforeach
                            </ul>

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <a href="{{ route('checkout.index', ['f' => $robot->id]) }}" class="btn btn-success btn-lg" name="submit" value="buy">Buy</a>
                                    </div>
                                    <div class="col d-grid">
                                        <button type="button" @click="addToCart" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Related Products</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">

                @foreach($relatedRobots as $relatedRobot)


                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img style="width: 100% !important; margin-left: 0 !important; max-width: 100% !important; height: 430px !important; object-fit: cover !important;" class="card-img rounded-0 img-fluid" src="{{ $relatedRobot->image_url }}">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('shop.show', $relatedRobot->id) }}" class="h3 text-decoration-none">{{ $relatedRobot->name }}</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>M/L/X/XL</li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">${{ number_format($relatedRobot->price, 2) }}</p>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>


        </div>
    </section>
    <!-- End Article -->

    <script>
        const shopSingle = {
            id: @json($robot->id),
            addToCart() {
                try {
                    const savedIds = JSON.parse(localStorage.getItem('robot_ids'));
                    // FIXME: Check if saved ids is not an array of number
                    if (!savedIds) Alpine.store('cart').setItems([]);
                    else Alpine.store('cart').setItems(savedIds);
                } catch (e) {
                    Alpine.store('cart').setItems([]);
                }

                Alpine.store('cart').add(this.id);
                localStorage.setItem('robot_ids', JSON.stringify(Alpine.store('cart').items));
            }
        }
    </script>


@endsection
