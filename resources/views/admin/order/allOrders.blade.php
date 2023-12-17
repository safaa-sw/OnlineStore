@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Orders</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped mt-2 mb2">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $index = 0;
                                @endphp
                                @foreach ($allOrders as $order)
                                    @php
                                        $index += 1;
                                    @endphp
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td>{{ $orderUsers[$index] }}</td>
                                        <td>
                                            @if ($order->done != null)
                                                <p class="badge badge-success badge-sm"> <i
                                                        class="mdi mdi-thumb-up-outline"></i> Done </p>
                                            @else
                                                <p class="badge badge-warning badge-sm"> <i class="mdi mdi-timer-sand"> Waiting</i>
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="{{ route('order.show', $order->id) }}" class="badge badge-success badge-sm"><i
                                                            class="mdi mdi-eye"></i> Show</a>
                                                </div>
                                                @if ($order->done == null)
                                                <div class="col-md-3">
                                                    <a href="{{ route('order.do', $order->id) }}"
                                                        class="badge badge-info badge-sm"> <i class="mdi mdi-send"> Do Order</i>
                                                    </a>

                                                </div>
                                            @endif
                                                
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination Start -->
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $allOrders->previousPageUrl() }}"
                                            tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item disabled"></li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $allOrders->nextPageUrl() }}">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
