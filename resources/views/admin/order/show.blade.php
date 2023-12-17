@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order {{ $orderInfo['id'] }}</h4>
                        <br />
                        <h4>User Name : {{ $orderInfo['userName'] }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped mt-2 mb2">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart->items as $item)
                                    <tr>
                                        <td>{{ $item['title'] }}</td>
                                        <td>{{ $item['price'] }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <p class="badge badge-info badge-sm text-black">Total Price :
                                    ${{ $cart->totalPrice }}</p>
                            </div>

                            @if ($orderInfo['done'] != null)
                                <div class="col">
                                    <p class="badge badge-success badge-sm"> <i class="mdi mdi-thumb-up-outline"></i> Done
                                    </p>
                                </div>
                            @else
                                <div class="col">
                                    <p class="badge badge-warning badge-sm"> <i class="mdi mdi-timer-sand"> Waiting</i>
                                    </p>
                                </div>
                                <div class="col">
                                    <a href="{{ route('order.do', $orderInfo['id']) }}" class="badge badge-info badge-sm">
                                        <i class="mdi mdi-send"> Do order</i>
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>



        </div>
        <br />
        <a href="{{ route('order.all') }}" class="btn btn-dark btn-sm"> Back To List</a>
    </div>
@endsection
