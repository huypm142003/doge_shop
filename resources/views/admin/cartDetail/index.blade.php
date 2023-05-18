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
                                <h2 class="ml-lg-2">Manage Cart Details</h2>
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
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Cart ID</th>
                                <th>Product ID</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($viewData['cartDetails'] as $cartDetail)
                                <tr>
                                    <td>{{ $cartDetail->getID() }}</td>
                                    <td>{{ $cartDetail->getPrice() }}$</td>
                                    <td>{{ $cartDetail->getQuantity() }}</td>
                                    <td>{{ $cartDetail->getCartId() }}</td>
                                    <td>{{ $cartDetail->getProductId() }}</td>
                                    <th>
                                        <a href="{{ route('admin.cartDetail.edit', ['id'=>$cartDetail->getId()]) }}">
                                            <i class="material-icons edit">&#xE254;</i>
                                        </a>
                                    </th>
                                    <form method="POST" action="{{ route('admin.cartDetail.delete', $cartDetail->getId()) }}">
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
                            <h5 class="modal-title">Add Cart Detail</h5>
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
                            <form method="POST" action="{{ route('admin.cartDetail.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Price</label>
                                    <input name="price" value="{{ old('price') }}" type="text" class="form-control"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input name="quantity" value="{{ old('quantity') }}" type="text" class="form-control"
                                        required>
                                </div>
                                <label>Cart ID</label>
                                <select name="cart_id" required class="custom-select custom-select-md mb-3">
                                    @foreach ($viewData['carts'] as $cart)
                                        <option value="{{ $cart->getID() }}">{{ $cart->getID() }}</option>
                                    @endforeach
                                </select>
                                <label>Product ID</label>
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
