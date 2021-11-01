@extends('Admin.layouts.admin')

@section('title')
    <title>Order View</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('css\order_view.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('Admin.pages.content-header', ['name' => 'Order', 'key' => ''])
        <div class="content">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <a href="{{route('order_index')}}" class="btn btn-link"><i class="fa fa-long-arrow-alt-left" ria-hidden="true"></i> Back</a>
                    </div>
                    <div class="card">
                        <div class="text-left logo p-2 px-5"><img src="{{asset('storage\logo\MoblieShop.png')}}"
                                                                  width="100">
                        </div>
                        <div class="invoice p-5">
                            <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="py-2"><span class="d-block text-muted">Order Date</span>
                                                <span>{{date_format($order->created_at, ' d M Y')}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="py-2"><span class="d-block text-muted">Order No</span>
                                                <span>{{$order->id}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="py-2"><span
                                                    class="d-block text-muted">Payment</span><span>Cash</span></div>
                                        </td>
                                        <td>
                                            <div class="py-2"><span class="d-block text-muted">Shiping Address</span>
                                                <span>{{$customer->address}}</span></div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product border-bottom table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                    @foreach($ordersItem->where('order_id', $order->id) as $orItem)
                                        @foreach($product->where('id',$orItem->product_id ) as $productItem)
                                            @php
                                                $totalAll = $totalAll + (($orItem->quantity)*($productItem->price));
                                            @endphp
                                            <tr>
                                                <td width="20%"><img src="{{$productItem->feature_img_path}}"
                                                                     width="90"></td>
                                                <td width="60%"><span
                                                        class="font-weight-bold">{{$productItem->name}}</span>
                                                    <div class="product-qty"><span
                                                            class="d-block">Quantity: {{$orItem->quantity}}</span>
                                                        <span>Price: {{number_format($productItem->price)}} VND</span>
                                                    </div>
                                                </td>
                                                <td width="20%">
                                                    <div class="text-right"><span class="font-weight-bold">{{number_format(($orItem->quantity * $productItem->price))}} VND</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-5">
                                    <table class="table table-borderless">
                                        <tbody class="totals">
                                        <tr>
                                            <td>
                                                <div class="text-left"><span class="text-muted">Subtotal</span></div>
                                            </td>
                                            <td>
                                                <div class="text-right"><span>{{number_format($totalAll)}}</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text-left"><span class="text-muted">Shipping Fee</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-right"><span>Free Ship</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text-left"><span class="text-muted">Tax Fee</span></div>
                                            </td>
                                            <td>
                                                <div class="text-right"><span>5%</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text-left"><span class="text-muted">Discount</span></div>
                                            </td>
                                            <td>
                                                <div class="text-right"><span class="text-success">0</span></div>
                                            </td>
                                        </tr>
                                        <tr class="border-top border-bottom">
                                            <td>
                                                <div class="text-left"><span class="font-weight-bold">Subtotal</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-right"><span
                                                        class="font-weight-bold">{{number_format(($totalAll - ($totalAll*5/100)))}}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                            <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Nike Team</span>
                        </div>
                        <div class="d-flex justify-content-between footer p-3">
                            <span><a href="" class="btn btn-danger" role="button"> Refuse </a> </span>
                            <span><a href="" class="btn btn-success" role="button"> Confirm </a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
