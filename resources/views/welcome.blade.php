@extends('layouts.shell')

@section('shell.content')


    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/robotback.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>{{ config('app.name') }}</b> Sites</h1>
                                <p>Discover the world of robots at our online shop. With a wide selection, detailed product info, and expert support, finding the perfect robot has never been easier. Shop now!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/kalianharus.png" alt=""style = "margin-left:100px !important;">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h2>About</h2>
                                <p>A robot online shop is a store that sells robots through various channels, including web-based platforms and mobile applications. These shops offer a wide range of robots, with detailed product information, reviews, and ratings available for customers. Some shops may also provide technical support and after-sales services.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/sewa.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Selling and Renting Robots</h1>
                                <p>Experience the latest in robotic technology with our sales and rental services. Buy a robot for full customization and operation, or rent one for a flexible, cost-effective option. Browse our top-quality robots and expert support for hassle-free usage. Discover the amazing world of robots today!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1"><strong>Hot categories this month</strong></h1>
                <p>Shop hot robotics categories for the best products and expert support. Checkout easily and securely. Buy now!</p>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-12 col-md-4 p-5 mt-3">
                    <a href="{{ route('shop') }}"><img style="width: 344px !important; margin-left: 0 !important; max-width: 100% !important; height: 268px !important; object-fit: cover !important;" src="{{ $category['image_url'] }}" class="rounded-circle img-fluid border"></a>
                    <h5 class="text-center mt-3 mb-3">{{ $category['name'] }}</h5>
                    <p class="text-center"><a href="{{ route('shop') }}" class="btn btn-success">Go Shop</a></p>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1"><strong>Featured Products</strong></h1>
                </div>
            </div>
            <div class="row">
                @foreach($featuredRobots as $robot)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('shop.show', $robot->id) }}">
                                <img style="width: 100% !important; height: 354px !important; object-fit: cover !important;" src="{{ \App\Util\Clodinary::scaleTo($robot->fetchFirstMedia()->getFilename(), 400, 400)->toUrl() }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                    <li class="text-muted text-right">${{ number_format($robot->price, 2) }}</li>
                                </ul>
                                <a href="{{ route('shop.show', $robot->id) }}" class="h2 text-decoration-none text-dark">{{ $robot->name }}</a>
                                <p class="card-text">
                                    {{ $robot->description }}
                                </p>
                                <p class="text-muted">Reviews (24)</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Featured Product -->



    @endsection
