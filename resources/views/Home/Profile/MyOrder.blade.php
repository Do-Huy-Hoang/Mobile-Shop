@extends('Home.profile')
@section('Css')
    <link rel="stylesheet" href="{{asset('css\MyOrder.css')}}">
@endsection
@section('profile_content')
    <div class="profile_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <article class="card">
                        <header class="card-header"> My Orders / Tracking </header>
                        @foreach($orders as $ordersItem )
                        <div class="card-body">
                            <h6>Order ID: {{$ordersItem->id}}</h6>
                            <article class="card">
                                @php
                                    $totalAll = 0;
                                    foreach ($ordersItems->where('order_id', $ordersItem->id) as $oritem){
                                        foreach ($product->where('id', $oritem->product_id) as $productItem){
                                            $totalAll = $totalAll + ($oritem->quantity)*($productItem->price);
                                        }
                                    }
                                @endphp
                                <div class="card-body row">
                                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>{{date_format($ordersItem->created_at, 'd M Y')}} </div>
                                    <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                                    <div class="col"> <strong>Status:</strong> <br> {{$ordersItem->status}} </div>
                                    <div class="col"> <strong>Tracking #:</strong> <br> BD{{$ordersItem->id}} </div>
                                    <div class="col"> <strong>Total all:</strong> <br>{{number_format($totalAll)}} </div>
                                </div>
                            </article>
                            <div class="track">
                                <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                <div class="step"> <span class="icon"> <i class="fas fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
                            </div>
                            <hr>
                            <ul class="row">
                                @foreach($ordersItems->where('order_id', $ordersItem->id) as $oritem)
                                    @foreach($product->where('id', $oritem->product_id) as $productItem)
                                        <li class="col-md-12">
                                            <figure class="itemside mb-3">
                                                <div class="aside"><img class="img_my_order" src="{{$productItem->feature_img_path}}"></div>
                                                <figcaption class="info align-self-center">
                                                    <p class="title">{{$productItem->name}}</p>
                                                    <div class="col-md-4">
                                                        <span class="text-muted">Quantity: {{$oritem->quantity}}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <span class="text-muted">Total: {{number_format(($oritem->quantity)*($productItem->price))}} VND</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                        <hr> <a href="{{route('product', ['id', 0])}}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
