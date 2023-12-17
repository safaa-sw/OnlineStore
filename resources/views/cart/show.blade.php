@extends('layouts.app')

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('store')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Products</a></li>
            <li class="breadcrumb-item active">Cart</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            @if ($cart)
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @foreach ($cart->items as $product)
                                <tr>
                                    <td>
                                        <div class="img">
                                            <a href="#"><img src="{{asset($product['image'])}}" alt="Image"></a>
                                            <p>{{$product['title']}}</p>
                                        </div>
                                    </td>
                                    <td>{{$product['price']}}</td>
                                    <td>
                                        <div class="qty">
                                            <a href="{{route('cart.decrease',$product['id'])}}" class="btn btn-danger btn-sm">-</a>
                                            <input type="text" name="qty" id="qty" value="{{$product['qty']}}">
                            <a href="{{route('cart.increase',$product['id'])}}" class="btn btn-success btn-sm">+</a>
                            
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{route('cart.remove',$product['id'])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" ><i class="fa fa-trash"></i></button>
            
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Total Quantity<span>{{$cart->totalQty}}</span></p>
                                    <p>Total Price<span>${{$cart->totalPrice}}</span></p>
                                </div>
                                <br/>
                                <div class="cart-btn">
                                    <a href="{{route('order.confirm')}}" class="btn btn-info">Confirm Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-8" style="height: 300px">
                <p> There are no items in the cart</p> 
            </div> 
            @endif
            
        </div>
    </div>
</div>
<!-- Cart End -->


@endsection
