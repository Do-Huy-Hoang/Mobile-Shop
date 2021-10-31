@extends('Admin.layouts.admin')

@section('title')
    <title>Order</title>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('Admin.pages.content-header', ['name' => 'Order', 'key' => ''])
    <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <!-- SidebarSearch Form -->
                        <form method="GET" action="">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control form-control-lg"
                                       placeholder="Type your keywords here">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class=" col-md-12">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="col-md-1">#</th>
                                <th scope="col" class="col-md-3">Customer Name</th>
                                <th scope="col" class="col-md-2">Id order</th>
                                <th scope="col" class="col-md-3">Status</th>
                                <th scope="col" class="col-md-3">Total</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                @php
                                    $totalAll = 0;
                                       foreach ($ordersItem->where('order_id', $order->id) as $oritem){
                                           foreach ($product->where('id', $oritem->product_id) as $productItem){
                                               $totalAll = $totalAll + (($oritem->quantity)*($productItem->price));
                                           }
                                       }
                                @endphp
                                @foreach($customer->where('id', $order->customer_id) as $customerItem)
                                    <tr>
                                        <th scope="row">{{$customerItem->id}}</th>
                                        <td>{{ $customerItem->name }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ number_format($totalAll) }} VND</td>
                                        <td>
                                            @can('category-edit')
                                                <a href="{{route('order_view', ['id'=>$order->id])}}"
                                                   class="btn btn-success" role="button"><i class="fa fa-eye fa-2x"
                                                                                            aria-hidden="true"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @include('sweetalert::alert')
    <!-- /.content -->
    </div>
@endsection


