@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Products</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped mt-2 mb2">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->title }}</td>
                                        <td>${{ $product->price }}</td>
                                        <td><img src="{{ asset($product->image) }}" style="height: 60px; width:60px"></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="badge badge-success badge-sm"><i
                                                            class="mdi mdi-pencil-box-outline"></i></a>
                                                </div>
                                                <div class="col-md-3">
                                                    <form action="{{ route('product.destroy', $product->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="badge badge-danger badge-sm"><i
                                                                class="mdi mdi-delete"></i></button>

                                                    </form>

                                                </div>
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
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}"
                                            tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item disabled"></li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
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
