@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @php
                    $index = -1;
                @endphp
                @foreach ($carts as $cart)
                    @php
                        $index += 1;
                    @endphp
                    <div class="card mb-3">
                        <div class="card-header">Order {{ $index + 1 }}</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach ($cart->items as $item)
                                        <tr>
                                            <td>{{ $item['title'] }}</td>
                                            <td>{{ $item['price'] }}</td>
                                            <td>{{ $item['qty'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col">
                                    <p class="badge badge-pill badge-primary mb-3 p-3 text-white">Total Price :
                                        ${{ $cart->totalPrice }}</p>
                                </div>
                                <div class="col">
                                    @if ($orders[$index]['done'] != null)
                                        <p class="badge badge-pill badge-success mb-3 p-3 text-white">Status : Done</p>
                                    @else
                                        <p class="badge badge-pill badge-secondary mb-3 p-3 text-white">Status : Waiting</p>
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
