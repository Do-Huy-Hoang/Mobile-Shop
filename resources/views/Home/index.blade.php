@extends('layouts.index')
@section('title')
    <title>Home</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('css\product.css')}}">
@endsection
@section('content')
    @include('Pages.slider')
  <div class="container">
      @foreach($category->where('id_parent', '0') as $item)
        <h3 class="h3">{{$item->name}}  <span class="right badge badge-danger">New</span></h3>
        <div class="row">
            @php
                $count = 0;
            @endphp
            @foreach($category->where('id_parent', $item->id) as $itemList)
              @foreach($product->where('category_id', $itemList->id) as $productItem)
                  @if( ($count++) < 1)
                    <div class="col-md-3 col-sm-6 ">
                        <div class="product-grid6">
                            <div class="product-image6 product_home">
                                <a href="#">
                                    <img class="pic-1" src="{{$productItem->feature_img_path}}">
                                </a>
                            </div>
                            <ul class="social">
                                <li><a href="{{route('product_details',['id'=>$productItem->id])}}" data-tip="See details">Go</a></li>
                            </ul>
                        </div>
                    </div>
                  @endif
                @endforeach
                  @php
                      $count = 0;
                  @endphp
            @endforeach
        </div>
      @endforeach
    </div>
    <hr>
@endsection
