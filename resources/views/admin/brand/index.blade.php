@extends('layouts.admin');
@section('title', $viewData['title'])
@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                <h2 class="ml-lg-2">Manage Brands</h2>
                            </div>
                            <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                <a href="#add" class="btn btn-success" data-toggle="modal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Add</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($viewData['brands'] as $brand)
                                <tr>
                                    <td>{{ $brand->getID() }}</td>
                                    <td>{{ $brand->getName() }}</td>
                                    <th>
                                        <a href="{{ route('admin.brand.edit', ['id'=>$brand->getId()]) }}">
                                            <i class="material-icons edit">&#xE254;</i>
                                        </a>
                                    </th>
                                    <form method="POST" action="{{ route('admin.brand.delete', $brand->getId()) }}">
                                        <th>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete">
                                                <i class="material-icons">&#xE872;</i>
                                            </button>
                                        </th>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#">Previous</a></li>
                            <li class="page-item active"><a href="#"class="page-link">1</a></li>
                            <li class="page-item "><a href="#"class="page-link">2</a></li>
                            <li class="page-item "><a href="#"class="page-link">3</a></li>
                            <li class="page-item "><a href="#"class="page-link">4</a></li>
                            <li class="page-item "><a href="#"class="page-link">5</a></li>
                            <li class="page-item "><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Add Model -->
            <div class="modal fade" tabindex="-1" id="add" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add brand</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <!-- Error Message -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" value="{{ old('name') }}" type="text" class="form-control"
                                        required>
                                </div>
                                <div class="submit-group">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
