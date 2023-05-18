@extends('layouts.admin');
@section('title', $viewData['title'])
@section('content')
    <div class="update-page">
        <div class="" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update user</h5>
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
                    <form method="POST" action="{{ route('admin.user.update', ['id' => $viewData['users']->getId()]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" value="{{ $viewData['users']->getName() }}" type="text"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" value="{{ $viewData['users']->getEmail() }}" type="text"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" value="{{ $viewData['users']->getPassword() }}" type="text"
                                class="form-control" required>
                        </div>
                        <label>Role</label>
                        <select name="role" required class="custom-select custom-select-md mb-3">
                            <option @if ($viewData['users']->getRole() === 'client') selected @endif value="client">Client</option>
                            <option @if ($viewData['users']->getRole() === 'admin') selected @endif value="admin">Admin</option>
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
