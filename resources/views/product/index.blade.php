@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
  <div class="container-fluid">
      <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('store')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('product.index')}}">Products</a></li>
          <li class="breadcrumb-item active">Product List</li>
      </ul>
  </div>
</div>
<!-- Breadcrumb End -->
 <!-- Product List Start -->
 <div class="product-view">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
              <div class="row">
                @foreach ($products as $product)
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
              
              <!-- Pagination Start -->
              <div class="col-md-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="{{$products->previousPageUrl()}}" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item disabled"></li>
                        <li class="page-item">
                            <a class="page-link" href="{{$products->nextPageUrl()}}">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
              <!-- Pagination Start -->
          </div>           
      </div>
  </div>
</div>
<!-- Product List End -->  

@endsection