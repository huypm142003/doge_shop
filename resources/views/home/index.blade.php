@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <!-- hero section -->
    <div class="hero">
        <div class="slider">
            <div class="container">
                <!-- slide item -->
                <div class="slide active">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">
                                JBL TUNE 750TNC
                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                Next-gen design
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis quis doloribus id est,
                                quos magni culpa numquam sequi corrupti. Est expedita corrupti dolorum aliquid fuga amet
                                voluptatem. Sint, quas. Quas.
                            </p>
                            <div class="top-down trans-delay-0-6">
                                <a href="{{ route('product.index') }}">
                                    <button class="btn-flat btn-hover">
                                        <span>shop now</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="img top-down">
                        <img src="{{ asset('/img/JBL_E55BT_KEY_RED_6063_FS_x1-1605x1605px.webp') }}" alt="">
                    </div>
                </div>
                <!-- slide item -->
                <div class="slide">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">
                                JBL Quantum ONE
                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                Ipsum dolor
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. A optio, voluptatum aperiam nobis
                                quis maxime corporis porro alias soluta sunt quae consectetur aliquid blanditiis
                                perspiciatis labore cumque, ullam, quam eligendi!
                            </p>
                            <div class="top-down trans-delay-0-6">
                                <a href="{{ route('product.index') }}">
                                    <button class="btn-flat btn-hover">
                                        <span>shop now</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="img right-left">
                        <img src="{{ asset('/img/JBL_E55BT_KEY_BLACK_6175_FS_x1-1605x1605px.png') }}" alt="">
                    </div>
                </div>
                <!-- slide item -->
                <div class="slide">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">
                                JBL JR 310BT
                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                Consectetur Elit
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo aut fugiat, libero
                                magnam nemo inventore in tempora beatae officiis temporibus odit deserunt molestiae amet
                                quam, asperiores, iure recusandae nulla labore!
                            </p>
                            <div class="top-down trans-delay-0-6">
                                <a href="{{ route('product.index') }}">
                                    <button class="btn-flat btn-hover">
                                        <span>shop now</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="img left-right">
                        <img src="{{ asset('/img/JBL_JR 310BT_Product Image_Hero_Skyblue-compressed.jpg') }}"
                            alt="">
                    </div>
                </div>
            </div>
            <!-- slider controller -->
            <button class="slide-controll slide-next">
                <i class='bx bxs-chevron-right'></i>
            </button>
            <button class="slide-controll slide-prev">
                <i class='bx bxs-chevron-left'></i>
            </button>
        </div>
    </div>

    <!-- promotion section -->
    <div class="promotion">
        <div class="row">
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>Headphone & Earbuds</h3>
                        <a href="{{ route('product.index') }}"><button class="btn-flat btn-hover"><span>shop
                                    collection</span></button></a>
                    </div>
                    <img src="{{ asset('/img/JBLHorizon_001_dvHAMaster.png') }}" alt="">
                </div>
            </div>
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>JBL Quantum Series</h3>
                        <a href="{{ route('product.index') }}"><button class="btn-flat btn-hover"><span>shop
                                    collection</span></button></a>
                    </div>
                    <img src="{{ asset('/img/kisspng-beats-electronics-headphones-apple-beats-studio-red-headphones.png') }}"
                        alt="">
                </div>
            </div>
            <div class="col-4 col-md-12 col-sm-12">
                <div class="promotion-box">
                    <div class="text">
                        <h3>True Wireless Earbuds</h3>
                        <a href="{{ route('product.index') }}"><button class="btn-flat btn-hover"><span>shop
                                    collection</span></button></a>
                    </div>
                    <img src="{{ asset('/img/JBL_TUNE220TWS_ProductImage_Pink_ChargingCaseOpen.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- product list -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                <h2>Featured products</h2>
            </div>
            <div class="row">
                @foreach ($viewData['products'] as $product)
                    @if ($product->getIsFeatured() === 'Yes')
                        <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                            <div class="col-3 col-md-6 col-sm-12">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <img src="{{ asset('/storage/' . $product->getImage()) }}" alt="">
                                        <img src="{{ asset('/storage/' . $product->getImage2()) }}" alt="">
                                    </div>
                                    <div class="product-card-info">
                                        <div class="product-btn">
                                            <a href="{{ route('product.show', ['id' => $product->getId()]) }}"
                                                class="btn-flat btn-hover btn-shop-now">view</a>
                                            <form method="POST" action="{{ route('cart.add', ['id'=>$product->getId()]) }}">
                                                @csrf
                                                <button class="btn-flat btn-hover btn-cart-add">
                                                    <i class='bx bxs-cart-add'></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="product-card-name">
                                            {{ $product->getName() }}
                                        </div>
                                        <div class="product-card-price">
                                            {{ $product->getPrice() }}$
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="section-footer">
                <a href="{{ route('product.index') }}" class="btn-flat btn-hover">view all</a>
            </div>
        </div>
    </div>

    <!-- special product -->
    <div class="bg-second">
        <div class="section container">
            <div class="row">
                <div class="col-4 col-md-4">
                    <div class="sp-item-img">
                        <img src="{{ asset('/img/kisspng-beats-electronics-headphones-apple-beats-studio-red-headphones.png') }}"
                            alt="">
                    </div>
                </div>
                <div class="col-7 col-md-8">
                    <div class="sp-item-info">
                        <div class="sp-item-name">JBL TUNE 750TNC</div>
                        <p class="sp-item-description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore dignissimos itaque et eaque quod
                            harum vero autem? Reprehenderit enim non voluptate! Qui provident modi est non eius ratione,
                            debitis iure.
                        </p>
                        <a href="{{ route('product.index') }}" class="btn-flat btn-hover">shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product list -->
    <div class="section">
        <div class="container">
            <div class="section-header">
                <h2>best selling</h2>
            </div>
            <div class="row">
                @foreach ($viewData['products'] as $product)
                    @if ($product->getIsBestSeller() === 'Yes')
                        <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                            <div class="col-3 col-md-6 col-sm-12">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <img src="{{ asset('/storage/' . $product->getImage()) }}" alt="">
                                        <img src="{{ asset('/storage/' . $product->getImage2()) }}" alt="">
                                    </div>
                                    <div class="product-card-info">
                                        <div class="product-btn">
                                            <a href="{{ route('product.show', ['id' => $product->getId()]) }}"
                                                class="btn-flat btn-hover btn-shop-now">view</a>
                                            <form method="POST" action="{{ route('cart.add', ['id'=>$product->getId()]) }}">
                                                @csrf
                                                <button class="btn-flat btn-hover btn-cart-add">
                                                    <i class='bx bxs-cart-add'></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="product-card-name">
                                            {{ $product->getName() }}
                                        </div>
                                        <div class="product-card-price">
                                            {{ $product->getPrice() }}$
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
            <div class="section-footer">
                <a href="{{ route('product.index') }}" class="btn-flat btn-hover">view all</a>
            </div>
        </div>
    </div>

@endsection
