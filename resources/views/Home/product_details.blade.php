@extends('layouts.index')
@section('title')
    <title>Home</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('css\product_details.css')}}">
@endsection
@section('Js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js\product_details.js')}}"></script>
@endsection
@section('content')
    <!--Section: Block Content-->
    <section class="col-md-12 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                        <div class="d-flex">
                            <div class="card">
                                <div class="d-flex flex-column thumbnails">
                                    <div id="f1" class="tb tb-active">
                                        <img class="thumbnail-img fit-image" src="{{$product->feature_img_path}}">
                                    </div>
                                    @foreach($productImage as $productItem)
                                        <div id="f{{$count_1++}}" class="tb">
                                            <img class="thumbnail-img fit-image" src="{{$productItem->img_path}}">
                                        </div>
                                    @endforeach
                                </div>
                                <fieldset id="f11" class="active">
                                    <div class="product-pic"><img class="pic0" src="{{$product->feature_img_path}}">
                                    </div>
                                </fieldset>
                                @foreach($productImage as $productItem)
                                    <fieldset id="f{{$count_2++}}1">
                                        <div class="product-pic"><img class="pic0" src="{{$productItem->img_path}}">
                                        </div>
                                    </fieldset>
                                @endforeach
                            </div>
                        </div>
                </div>
                    <div class="col-md-6">
                        <h5>{{$product->name}}</h5>
                        <p class="mb-2 text-muted text-uppercase small category">{{$category->find($product->category_id)->name}}</p>
                        <ul class="rating">
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star disable"></li>
                        </ul>
                        <p><span class="mr-1"><strong>{{number_format($product->price)}}VND</strong></span></p>
                        <div class="pt-1">
                            @php
                                echo $product->content;
                            @endphp
                        </div>
                        <div class="table-responsive">
                        </div>
                        <hr>
                        <a type="button"
                           href=""
                                class="btn btn-primary btn-md mr-1 mb-2 buy_now"
                                data-url="{{route('add_to_cart',['id'=>$product->id])}}">Buy now
                        </a>
                        <a href="" role="button"
                           class="btn btn-light btn-md mr-1 mb-2 add_to_cart"
                           data-id="{{$category->find($product->category_id)->id}}"
                           data-url="{{route('add_to_cart',['id'=>$product->id])}}">
                            <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                        </a>
                    </div>
                </div>
            </div>
    </section>
@endsection
