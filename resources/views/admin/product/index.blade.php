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
                                <h2 class="ml-lg-2">Manage Products</h2>
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
                                <th>Price</th>
                                <th>IsFeatured</th>
                                <th>IsBestSeller</th>
                                <th>Product Type ID</th>
                                <th>Brand ID</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($viewData['products'] as $product)
                                <tr>
                                    <td>{{ $product->getID() }}</td>
                                    <td>{{ $product->getName() }}</td>
                                    <td>{{ $product->getPrice() }}$</td>
                                    <td>{{ $product->getIsFeatured() }}</td>
                                    <td>{{ $product->getIsBestSeller() }}</td>
                                    <td>{{ $product->getProductTypeId() }}</td>
                                    <td>{{ $product->getBrandId() }}</td>
                                    <th>
                                        <a href="{{ route('admin.product.edit', ['id'=>$product->getId()]) }}">
                                            <i class="material-icons edit">&#xE254;</i>
                                        </a>
                                    </th>
                                    <form method="POST" action="{{ route('admin.product.delete', $product->getId()) }}">
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
                            <h5 class="modal-title">Add product</h5>
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
                            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" value="{{ old('name') }}" type="text" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input name="price" value="{{ old('price') }}" type="text" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" rows="8" class="form-control" required>{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Description Detail</label>
                                    <textarea name="descriptionDetail" rows="12" class="form-control" required>{{ old('descriptionDetail') }}</textarea>
                                </div>
                                <label>Is Featured</label>
                                <select name="isFeatured" required class="custom-select custom-select-md mb-4">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <label>Is Best Seller</label>
                                <select name="isBestSeller" required class="custom-select custom-select-md mb-3">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <label>Product Types ID</label>
                                <select name="product_type_id" required class="custom-select custom-select-md mb-3">
                                    @foreach ($viewData['productTypes'] as $productType)
                                        <option value="{{ $productType->getID() }}">{{ $productType->getName() }}</option>
                                    @endforeach
                                </select>
                                <label>Brand ID</label>
                                <select name="brand_id" required class="custom-select custom-select-md mb-3">
                                    @foreach ($viewData['brands'] as $brand)
                                        <option value="{{ $brand->getID() }}">{{ $brand->getName() }}</option>
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
