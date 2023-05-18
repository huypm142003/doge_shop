@extends('layouts.admin');
@section('title', $viewData['title'])
@section('content')
    <div class="update-page">
        <div class="" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update cart</h5>
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
                    <form method="POST" action="{{ route('admin.cart.update', ['id' => $viewData['carts']->getId()]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Total</label>
                            <input name="total" value="{{ $viewData['carts']->getTotal() }}" type="text"
                                class="form-control" required>
                        </div>
                        <label>User ID</label>
                        <select name="user_id" required class="custom-select custom-select-md mb-3">
                            @foreach ($viewData['users'] as $user)
                                <option @if ($viewData['carts']->getUserID() === $user->getID()) selected @endif value="{{ $user->getID() }}">Name:
                                    {{ $user->getName() }}, ID: {{ $user->getID() }}
                                </option>
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
