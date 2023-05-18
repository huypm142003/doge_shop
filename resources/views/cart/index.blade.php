@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="container">
        <div class="box">
            <div class="breadcumb">
                <a href="{{ route('home.index') }}">home</a>
                <span><i class='bx bxs-chevrons-right'></i></span>
                <a href="{{ route('cart.index') }}">cart</a>
            </div>
        </div>
        <div class="shopping-cart">
            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-price">Price</label>
                <label class="product-quantity">Quantity</label>
                <label class="product-removal">Remove</label>
            </div>

            @foreach ($viewData['products'] as $product)
                <div class="product">
                    <div class="product-image">
                        <img src="{{ asset('/storage/' . $product->getImage()) }}">
                    </div>
                    <div class="product-details">
                        <div class="product-title">{{ $product->getName() }}</div>
                        {{-- <p class="product-description"></p> --}}
                    </div>
                    <div class="product-price">{{ $product->getPrice() }}$</div>
                    <div class="product-quantity">
                        <p>{{ session('products')[$product->getId()] }}</p>
                    </div>
                    <div class="product-removal">
                        <a href="{{ route('cart.delete', ['id'=>$product->getId()]) }}">
                            <button class="remove-product">
                                <i class='bx bx-trash'></i>
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach

            <div class="totals">
                <div class="totals-item">
                    <label>Shipping</label>
                    <div class="totals-value" id="cart-shipping">{{ $viewData['ship']}}$</div>
                </div>
                <div class="totals-item totals-item-total">
                    <label>Total</label>
                    <div class="totals-value" id="cart-total">{{ $viewData['total'] }}$</div>
                </div>
            </div>
            @if (count($viewData['products']) > 0)
                <a href="{{ route('cart.purchase') }}" class="checkout">Checkout</a>    
            @endif
        </div>
    </div>
@endsection
