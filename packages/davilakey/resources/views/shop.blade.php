@extends('layouts.shell')

@section('shell.content')
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    @foreach($categories as $category)
                        <li class="pb-3">
                            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                                {{ $category->name }}
                                <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                            </a>
                            <ul class="collapse show list-unstyled pl-3">
                                @foreach($category->subCategories as $subCategory)
                                    <li><a class="text-decoration-none" href="{{ route('shop', ['cat' => $category->id]) }}">{{ $subCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="{{ route('shop') }}">All</a>
                            </li>
                            @foreach($categories as $category)
                                <li class="list-inline-item">
                                    <a class="h3 text-dark text-decoration-none mr-3" href="{{ route('shop', ['cat' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <x-shop.card :$product></x-shop.card>
                    @endforeach
                </div>
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        @for($page = 1; $page < $products->lastPage() + 1; $page++)
                        <li @class(['page-item', 'disabled' => $products->currentPage() === $page])>
                            <a @class(['page-link', 'rounded-0', 'mr-3', 'shadow-sm', 'border-top-0', 'border-left-0', 'active' => $products->currentPage() === $page]) href="{{ $products->url($page) }}" tabindex="-1">{{ $page }}</a>
                        </li>
                        @endfor
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    @include('components.shell.brands')
    <!--End Brands-->

@endsection
