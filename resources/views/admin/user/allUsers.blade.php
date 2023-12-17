@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Users</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped mt-2 mb2">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="#"
                                                        class="badge badge-success badge-sm"><i
                                                            class="mdi mdi-pencil-box-outline"></i></a>
                                                </div>
                                                <div class="col-md-3">                                        
                                                        <button type="submit" class="badge badge-danger badge-sm"><i
                                                                class="mdi mdi-delete"></i></button>
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
                                        <a class="page-link" href="{{ $users->previousPageUrl() }}"
                                            tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item disabled"></li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a>
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
