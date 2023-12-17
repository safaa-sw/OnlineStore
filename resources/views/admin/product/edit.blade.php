@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Product Details</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="product title"
                                    value="{{ $product->title }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Price</label>
                                <input type="text" name="price" class="form-control" placeholder="product price"
                                    value="{{ $product->price }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Image</label><br>
                                <input type="file" class="form-control" id="image" name="image">
                                <img src="{{ asset($product->image) }}" style="height: 200px; width:200px" alt="">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Save</button>
                                <a href="{{ route('product.all') }}" class="btn btn-dark"> Back To List</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
