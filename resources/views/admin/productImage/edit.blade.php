@extends('layouts.admin');
@section('title', $viewData['title'])
@section('content')
    <div class="update-page">
        <div class="" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update product image</h5>
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
                        action="{{ route('admin.productImage.update', ['id' => $viewData['productImages']->getId()]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label for="image" class="input-group-text">Upload Image</label>
                            </div>
                            <input accept="image/*" type="file" class="form-control" id="image" name="image"
                                value="{{ $viewData['productImages']->getImage() }}">
                        </div>
                        <label>Product Name</label>
                        <select name="product_id" required class="custom-select custom-select-md mb-3">
                            @foreach ($viewData['products'] as $product)
                                <option @if ($viewData['productImages']->getProductId() === $product->getId()) selected @endif value="{{ $product->getID() }}">
                                    {{ $product->getName() }}</option>
                            @endforeach
                        </select>
                        <div class="submit-group">
                            <a href="{{ route('admin.productImage.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
