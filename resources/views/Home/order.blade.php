@extends('layouts.index')
@section('title')
    <title>Product</title>
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('css\order.css')}}">
@endsection
@section('Js')
    <script src="{{asset('js\shopping_cart.js')}}"></script>
@endsection
@section('content')
    <!--Section: Block Content-->
    <section>
        <form method="post" action="{{ route('create-order', ['id'=>auth()->id()])}}">
        @csrf
        <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-8 mb-4">
                    <!-- Card -->
                    <div class="card wish-list pb-1">
                        <div class="card-body">
                            <h5 class="mb-2">Billing details</h5>
                            <!-- Grid row -->
                            @foreach($customer as $customers)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="md-form md-outline mb-0 mb-lg-4">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control mb-0 mb-lg-2"
                                                   value="{{$customers->name}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- Grid row -->

                                <!-- Phone -->
                                <div class="md-form md-outline">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control"
                                           value="{{substr($customers->phone, 0,-8)}}@for($i= 1; $i <= strlen(substr($customers->phone, 2,-2)); $i++)*@endfor{{substr($customers->phone, -2)}}"
                                           readonly>
                                </div>

                                <!-- Email address -->
                                <div class="md-form md-outline">
                                    <label for="emai">Email address</label>
                                    <input type="email" class="form-control"
                                           value="{{substr($user->email, 0,2)}}@for($i= 1; $i <= strlen(substr($user->email, 2,-2)); $i++)*@endfor{{substr($user->email, -10)}}"
                                           readonly>
                                </div>

                                <!-- address -->
                                <div class="md-form md-outline">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" value="{{$customers->address}}" readonly>
                                </div>

                            @endforeach
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $id=> $cartItem)
                                    <tr>
                                        <td>
                                            <img class="order-img" src="{{$cartItem['image']}}" alt="Sample">
                                        </td>
                                        <td>
                                            <div class="order-name">
                                                {{$cartItem['name']}}
                                            </div>
                                        </td>
                                        <td>{{number_format($cartItem['price'])}} VND</td>
                                        <td>{{$cartItem['quantity']}}</td>
                                        <td>
                                            <div class="total">
                                                {{number_format($cartItem['price']*$cartItem['quantity'])}} VND
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4">
                    <!-- Card -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3">The total amount of</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Temporary amount
                                    <span>{{number_format($totalAll)}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span>Free Ship</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>The total amount of</strong>
                                        <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong>
                                    </div>
                                    <span><strong>{{number_format($totalAll)}}</strong></span>
                                </li>
                            </ul>
                            <button type="submit" role="button"
                               class="btn btn-primary btn-block waves-effect waves-light">Make purchase
                            </button>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="card mb-4">
                        <div class="card-body">

                            <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse"
                               href="#collapseExample"
                               aria-expanded="false" aria-controls="collapseExample">
                                Add a discount code (optional)
                                <span><i class="fas fa-chevron-down pt-1"></i></span>
                            </a>

                            <div class="collapse" id="collapseExample">
                                <div class="mt-3">
                                    <div class="md-form md-outline mb-0">
                                        <input type="text" id="discount-code" class="form-control font-weight-light"
                                               placeholder="Enter discount code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </form>
        @include('sweetalert::alert')
    </section>
@endsection
