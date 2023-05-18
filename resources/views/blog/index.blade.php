@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="container">
        <div class="box">
            <div class="breadcumb">
                <a href="{{ route('home.index') }}">home</a>
                <span><i class='bx bxs-chevrons-right'></i></span>
                <a href="{{ route('blog.index') }}">blog</a>
            </div>
        </div>
        @foreach ($viewData['blogs'] as $blog)
            @if ($blog->getId() % 2 !== 0)
                <div class="blog">
                    <div class="blog-img">
                        <img src="{{ asset('/storage/' . $blog->getImage()) }}" alt="">
                    </div>
                    <div class="blog-info">
                        <div class="blog-title">
                            {{ $blog->getTitle() }}
                        </div>
                        <div class="blog-preview">
                            {{ $blog->getContent() }}
                        </div>
                        <button class="btn-flat btn-hover">read more</button>
                    </div>
                </div>
            @else
                <div class="blog row-revere">
                    <div class="blog-img">
                        <img src="{{ asset('/storage/' . $blog->getImage()) }}" alt="">
                    </div>
                    <div class="blog-info">
                        <div class="blog-title">
                            {{ $blog->getTitle() }}
                        </div>
                        <div class="blog-preview">
                            {{ $blog->getContent() }}
                        </div>
                        <button class="btn-flat btn-hover">read more</button>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="section-footer">
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
@endsection
