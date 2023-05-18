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
                                <h2 class="ml-lg-2">Manage Product Images</h2>
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
                                <th>Image</th>
                                <th>Product ID</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($viewData['productImages'] as $productImage)
                                <tr>
                                    <td>{{ $productImage->getID() }}</td>
                                    <td style="text-align:center">
                                        <img src="{{ asset('/storage/' . $productImage->getImage()) }}" alt="image"
                                            style="width: 100px; height: auto;">
                                    </td>
                                    <td>{{ $productImage->getProductID() }}</td>
                                    <th>
                                        <a href="{{ route('admin.productImage.edit', ['id'=>$productImage->getId()]) }}">
                                            <i class="material-icons edit">&#xE254;</i>
                                        </a>
                                    </th>
                                    <form method="POST" action="{{ route('admin.productImage.delete', $productImage->getId()) }}">
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
                            <h5 class="modal-title">Add product image</h5>
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
                            <form method="POST" action="{{ route('admin.productImage.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <label for="image" class="input-group-text">Upload Image</label>
                                    </div>
                                    <input accept="image/*" type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                                </div>
                                <label>Product Name</label>
                                <select name="product_id" required class="custom-select custom-select-md mb-3">
                                    @foreach ($viewData['products'] as $product)
                                        <option value="{{ $product->getID() }}">{{ $product->getName() }}</option>
                                    @endforeach
                                </select>
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
