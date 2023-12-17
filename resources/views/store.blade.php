@extends('layouts.app')

@section('content')
    <!-- Main Slider Start -->
    <div class="header">
        <div class="container-fluid">
            <div class="row" style="height: 450px">
                <div class="col-md-3">
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('store') }}"><i class="fa fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-desktop"></i>Desktops</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-laptop"></i>Laptops</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-tablet"></i>Tablets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-mobile"></i>Mobiles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-print"></i>Printers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-fax"></i>Fax</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="header-slider normal-slider">
                        <div class="header-slider-item">
                            <img src="{{ asset('template/img/slider-1.jpg') }}" alt="Slider Image" />
                        </div>
                        <div class="header-slider-item">
                            <img src="{{ asset('template/img/slider-2.jpg') }}" alt="Slider Image" />
                        </div>
                        <div class="header-slider-item">
                            <img src="{{ asset('template/img/slider-3.jpg') }}" alt="Slider Image" />
                        </div>
                        <div class="header-slider-item">
                            <img src="{{ asset('template/img/slider-4.jpg') }}" alt="Slider Image" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="header-img">
                        <div class="img-item">
                            <img src="{{ asset('template/img/category-1.jpg') }}" />
                            <a class="img-text" href="">
                                <p>Laptops from all brands</p>
                            </a>
                        </div>
                        <div class="img-item">
                            <img src="{{ asset('template/img/category-2.jpg') }}" />
                            <a class="img-text" href="">
                                <p>Printers and their cartridges</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

    <!-- List Of Products -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Products</h1>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                @foreach ($latestProducts as $product)
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">{{ $product->title }}</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="#">
                                    <img src="{{ $product->image }}" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="{{ route('cart.add', $product->id) }}"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>$</span>{{ $product->price }}</h3>
                                <a class="btn" href="{{ route('cart.add', $product->id) }}"><i
                                        class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- List Of Products End -->
@endsection
