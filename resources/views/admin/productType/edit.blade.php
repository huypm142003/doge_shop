@extends('layouts.admin');
@section('title', $viewData['title'])
@section('content')
    <div class="update-page">
        <div class="" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update product type</h5>
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
                        action="{{ route('admin.productType.update', ['id' => $viewData['productTypes']->getId()]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" value="{{ $viewData['productTypes']->getName() }}" type="text"
                                class="form-control" required>
                        </div>
                        <div class="submit-group">
                            <a href="{{ route('admin.productType.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
