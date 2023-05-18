@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="bg-main">
        <div class="container">
            <div class="box">
                <div class="breadcumb">
                    <a href="{{ route('home.index') }}">home</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a href="{{ route('product.index') }}">all products</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>
                    <a
                        href="{{ route('product.show', ['id' => $viewData['product']->getId()]) }}">{{ $viewData['product']->getName() }}</a>
                </div>
            </div>
            <div class="row product-row">
                <div class="col-5 col-md-12">
                    <div class="product-img" id="product-img">
                        <img src="{{ asset('/storage/' . $viewData['product']->getImage()) }}" alt="">
                    </div>
                    <div class="box">
                        <div class="product-img-list">
                            <div class="product-img-item">
                                <img src="{{ asset('/storage/' . $viewData['product']->getImage()) }}" alt="">
                            </div>
                            <div class="product-img-item">
                                <img src="{{ asset('/storage/' . $viewData['product']->getImage2()) }}" alt="">
                            </div>
                            <div class="product-img-item">
                                <img src="{{ asset('/storage/' . $viewData['product']->getImage3()) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7 col-md-12">
                    <form method="POST" action="{{ route('cart.add', ['id'=>$viewData['product']->getId()]) }}">
                        @csrf
                        <div class="product-info">
                            <h1>
                                {{ $viewData['product']->getName() }}
                            </h1>
                            <div class="product-info-detail">
                                <span class="product-info-detail-title">Brand:</span>
                                <a href="#">{{ $viewData['product']->getBrandName() }}</a>
                            </div>
                            <div class="product-info-detail">
                                <span class="product-info-detail-title">Rated:</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                            <p class="product-description">
                                {{ $viewData['product']->getDescription() }}
                            </p>
                            <div class="product-info-price">{{ $viewData['product']->getPrice() }}$</div>
                            <div class="product-quantity-wrapper">
                                <div class="number-input">
                                    <a role="button" class="minus"></a>
                                    <input class="quantity" id="quantity" min="0" name="quantity" value="1" type="number">
                                    <a role="button" class="plus"></a>
                                </div>
                            </div>
                            <div>
                                <button class="btn-flat btn-hover">add to cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    description
                </div>
                <div class="product-detail-description">
                    <div class="product-detail-description-content">
                        <p>
                            {{ $viewData['product']->getDescription() }}
                        </p>
                        <p>
                            {{ $viewData['product']->getDescriptionDetail() }}
                        </p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="box">
                <div class="box-header">
                    review
                </div>
                <div>
                    <div class="user-rate">
                        <div class="user-info">
                            <div class="user-avt">
                                <img src="{{ asset('/img/doge.png') }}" alt="">
                            </div>
                            <div class="user-name">
                                <span class="name">Dog</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                        </div>
                        <div class="user-rate-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ea iste, veritatis nobis
                            amet illum, cum alias magni dolores odio, eius quo excepturi veniam ipsa voluptatibus natus
                            voluptas vero? Aspernatur!
                        </div>
                    </div>
                    <div class="user-rate">
                        <div class="user-info">
                            <div class="user-avt">
                                <img src="{{ asset('/img/doge.png') }}" alt="">
                            </div>
                            <div class="user-name">
                                <span class="name">Mouse</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                        </div>
                        <div class="user-rate-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ea iste, veritatis nobis
                            amet illum, cum alias magni dolores odio, eius quo excepturi veniam ipsa voluptatibus natus
                            voluptas vero? Aspernatur!
                        </div>
                    </div>
                    <div class="user-rate">
                        <div class="user-info">
                            <div class="user-avt">
                                <img src="{{ asset('/img/doge.png') }}" alt="">
                            </div>
                            <div class="user-name">
                                <span class="name">Cat</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                        </div>
                        <div class="user-rate-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ea iste, veritatis nobis
                            amet illum, cum alias magni dolores odio, eius quo excepturi veniam ipsa voluptatibus natus
                            voluptas vero? Aspernatur!
                        </div>
                    </div>
                    <div class="user-rate">
                        <div class="user-info">
                            <div class="user-avt">
                                <img src="{{ asset('/img/doge.png') }}" alt="">
                            </div>
                            <div class="user-name">
                                <span class="name">Pig</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                        </div>
                        <div class="user-rate-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ea iste, veritatis nobis
                            amet illum, cum alias magni dolores odio, eius quo excepturi veniam ipsa voluptatibus natus
                            voluptas vero? Aspernatur!
                        </div>
                    </div>
                    <div class="user-rate">
                        <div class="user-info">
                            <div class="user-avt">
                                <img src="{{ asset('/img/doge.png') }}" alt="">
                            </div>
                            <div class="user-name">
                                <span class="name">Chicken</span>
                                <span class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </span>
                            </div>
                        </div>
                        <div class="user-rate-content">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ea iste, veritatis nobis
                            amet illum, cum alias magni dolores odio, eius quo excepturi veniam ipsa voluptatibus natus
                            voluptas vero? Aspernatur!
                        </div>
                    </div>
                    <div class="box">
                        <ul class="pagination">
                            <li><a href="#"><i class='bx bxs-chevron-left'></i></a></li>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><i class='bx bxs-chevron-right'></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
