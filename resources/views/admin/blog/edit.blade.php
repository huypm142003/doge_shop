@extends('layouts.admin');
@section('title', $viewData['title'])
@section('content')
    <div class="update-page">
        <div class="" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update blog</h5>
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
                        action="{{ route('admin.blog.update', ['id' => $viewData['blogs']->getId()]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" value="{{ $viewData['blogs']->getTitle() }}" type="text" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <input name="content" value="{{ $viewData['blogs']->getContent() }}" type="text" class="form-control"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label for="image" class="input-group-text">Upload Image</label>
                            </div>
                            <input accept="image/*" type="file" class="form-control" id="image" name="image" value="{{ $viewData['blogs']->getImage() }}">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label for="date" class="input-group-text">Choose date</label>
                            </div>
                            <input type="date" class="form-control" id="date" name="date" value="{{ $viewData['blogs']->getDate() }}">
                        </div>
                        <div class="submit-group">
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
