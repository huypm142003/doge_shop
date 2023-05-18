@extends('layouts.admin');
@section('title', $viewData['title'])
@section('content')
    <div class="update-page">
        <div class="" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update cart detail</h5>
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
                    <form method="POST"
                        action="{{ route('admin.cartDetail.update', ['id' => $viewData['cartDetails']->getId()]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" value="{{ $viewData['cartDetails']->getPrice() }}" type="text"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input name="quantity" value="{{ $viewData['cartDetails']->getQuantity() }}" type="text"
                                class="form-control" required>
                        </div>
                        <label>Cart ID</label>
                        <select name="cart_id" required class="custom-select custom-select-md mb-3">
                            @foreach ($viewData['carts'] as $cart)
                                <option @if ($viewData['cartDetails']->getCartId() === $cart->getID()) selected @endif value="{{ $cart->getID() }}">
                                    {{ $cart->getID() }}</option>
                            @endforeach
                        </select>
                        <label>Product ID</label>
                        <select name="product_id" required class="custom-select custom-select-md mb-3">
                            @foreach ($viewData['products'] as $product)
                                <option @if ($viewData['cartDetails']->getProductId() === $product->getID()) selected @endif value="{{ $product->getID() }}">
                                    {{ $product->getName() }}</option>
                            @endforeach
                        </select>
                        <div class="submit-group">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
