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
                            <img class="img-fluid" src="./assets/img/robot2.jpg" style="width:400px;height:400px;"alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>PajeRobot</b> Sites</h1>
                                <h3 class="h2">Website pertama di indonesia yang menyediakan segala macam kebutuhan robotic</h3>
                                <p>
                                    PajeRobot website yang berisi tentang informasi robotic,jual-beli,penyewaan robot, dan lain-lain tentang robot.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_img_02.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h2>KALIAN HARUS TAU!!</h2>
                                <h3 class="h2">Informasi</h3>
                                <p>
                                Robot adalah mesin yang dapat melakukan tindakan kompleks secara otomatis.  Mereka umumnya membutuhkan tiga elemen: sensor seperti kamera, lidar, atau mikrofon;  aktuator seperti motor, piston atau otot buatan, dan pengontrol.

Robot mungkin dikendalikan dari jarak jauh oleh manusia, tetapi seringkali sebagian atau seluruhnya dikendalikan oleh komputer, menjadikannya otonom.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_img_03.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Jual-Beli dan Sewa Robot</h1>
                                <h3 class="h2">Kami Menyediakan Robot Dalam Berbagai Kebutuhan Mulai Dari Robot Industri,Robot Elektrik dan masih banyak lagi. </h3>
                                <p>
                                    Di website ini kalian bisa menemukan jenis robot yang kalian inginkan dan butuhkan.
                                    Kami juga menjual sparepart robot agar mempermudah customer mencari sparepart yang belum tersedia.
                                </p>
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
                <h1 class="h1">Categories of The Month</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-12 col-md-4 p-5 mt-3">
                    <a href="{{ route('shop') }}"><img style="width: 344px !important; height: 268px !important; object-fit: cover !important;" src="{{ $category['image_url'] }}" class="rounded-circle img-fluid border"></a>
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
                    <h1 class="h1">Featured Product</h1>
                    <p>
                        Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach($featuredRobots as $robot)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('shop.show', $robot->id) }}">
                                <img style="width: 100% !important; height: 354px !important; object-fit: cover !important;" src="{{ $robot->image_url }}" class="card-img-top" alt="...">
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
