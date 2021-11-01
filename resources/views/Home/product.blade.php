@extends('layouts.index')

@section('title')
    <title>Product</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('css\product.css')}}">
    <link rel="stylesheet" href="{{asset('css\sidebar.css')}}">
@endsection
@section('Js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js\product.js')}}"></script>
@endsection
@section('content')
    <section>
        <div class="row">
            <div class="col-md-3">
                @include('Pages.sidebar')
            </div>

            <div class="col-md-9 padding-right">
                <div class="row">
                    @if($categoryList != '')
                        @foreach($categoryList as $categoryListItem)
                            @foreach($product->where('category_id',$categoryListItem->id) as $productItem)
                                <div class="col-md-3 col-sm-6 product_a">
                                    <div class="product-grid">
                                        <div class="product-image">
                                            <a href="#">
                                                <img class="pic-1" src="{{$productItem->feature_img_path}}">
                                            </a>
                                            <ul class="social">
                                                <li><a href="{{route('product_details', ['id'=>$productItem->id])}}" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                                <li>
                                                    <a class="add_to_cart"
                                                       href="#"
                                                       data-url="{{route('add_to_cart',['id'=>$productItem->id])}}"
                                                       data-tip="Add to Wishlist"
                                                       ><i class="fa fa-shopping-bag"></i></a>
                                                </li>
                                                <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <ul class="rating">
                                            <li class="fa fa-star"></li>
                                            <li class="fa fa-star"></li>
                                            <li class="fa fa-star"></li>
                                            <li class="fa fa-star"></li>
                                            <li class="fa fa-star disable"></li>
                                        </ul>
                                        <div class="product-content">
                                            <h3 class="title"><a href="#">{{$productItem->name}}</a></h3>
                                            <span>{{number_format($productItem->price)}}VND</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        @endforeach
                    @else
                        @foreach($product as $productItem)
                            <div class="col-md-3 col-sm-6 product_a">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="#">
                                            <img class="pic-1" src="{{$productItem->feature_img_path}}">
                                        </a>
                                        <ul class="social">
                                            <li><a href="{{route('product_details', ['id'=>$productItem->id])}}" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                                            <li>
                                                <a class="add_to_cart"
                                                   href="#"
                                                   data-url="{{route('add_to_cart',['id'=>$productItem->id])}}"
                                                   data-tip="Add to Wishlist"
                                                ><i class="fa fa-shopping-bag"></i></a>
                                            </li>
                                            <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="rating">
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star disable"></li>
                                    </ul>
                                    <div class="product-content">
                                        <h3 class="title"><a href="#">{{$productItem->name}}</a></h3>
                                        <span>{{number_format($productItem->price)}}VND</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if($pp == true)
                            <div class="col-md-12">
                                {{$product->links()}}
                            </div>
                            @endif
                    @endif
                </div>
            </div>
            <hr>
        </div>
    </section>
    @include('sweetalert::alert')
    </div>
@endsection
