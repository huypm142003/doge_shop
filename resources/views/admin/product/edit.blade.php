@extends('layouts.admin');
@section('title', $viewData['title'])
@section('content')
    <div class="update-page">
        <div class="" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update product</h5>
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
                        action="{{ route('admin.product.update', ['id' => $viewData['products']->getId()]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" value="{{ $viewData['products']->getName() }}" type="text"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" value="{{ $viewData['products']->getPrice() }}" type="text"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea required name="description" rows="8" class="form-control">{{ $viewData['products']->getDescription() }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Description Detail</label>
                            <textarea required name="descriptionDetail" rows="12" class="form-control">{{ $viewData['products']->getDescriptionDetail() }}</textarea>
                        </div>
                        <label>Is Featured</label>
                        <select name="isFeatured" required class="custom-select custom-select-md mb-4">
                            <option @if ($viewData['products']->getIsFeatured() === 'Yes') selected @endif value="Yes">Yes</option>
                            <option @if ($viewData['products']->getIsFeatured() === 'No') selected @endif value="No">No</option>
                        </select>
                        <label>Is Best Seller</label>
                        <select name="isBestSeller" required class="custom-select custom-select-md mb-3">
                            <option @if ($viewData['products']->getIsBestSeller() === 'No') selected @endif value="No">No</option>
                            <option @if ($viewData['products']->getIsBestSeller() === 'Yes') selected @endif value="Yes">Yes</option>
                        </select>
                        <label>Product Types ID</label>
                        <select name="product_type_id" required class="custom-select custom-select-md mb-3">
                            @foreach ($viewData['productTypes'] as $productType)
                                <option @if ($viewData['products']->getProductTypeId() === $productType->getID()) selected @endif
                                    value="{{ $productType->getID() }}">{{ $productType->getName() }}
                                </option>
                            @endforeach
                        </select>
                        <label>Brand ID</label>
                        <select name="brand_id" required class="custom-select custom-select-md mb-3">
                            @foreach ($viewData['brands'] as $brand)
                                <option @if ($viewData['products']->getBrandId() === $brand->getID()) selected @endif value="{{ $brand->getID() }}">
                                    {{ $brand->getName() }}</option>
                            @endforeach
                        </select>
                        <div class="submit-group">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
