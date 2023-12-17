@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add New Product</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="product title">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Price</label>
                                <input type="text" name="price" class="form-control" placeholder="product price">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
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
