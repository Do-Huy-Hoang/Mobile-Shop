<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\OrderItems;
use App\Orders;
use App\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    private $product;
    private $customer;
    private $orders;
    private $orderItems;

    public function __construct(Product $product, Customer $customer, Orders $orders, OrderItems $orderItems)
    {
        $this->product = $product;
        $this->customer = $customer;
        $this->orders = $orders;
        $this->orderItems = $orderItems;
    }
    public function index(){
        $customer = $this->customer::all();
        $orders = $this->orders->latest()->paginate(5);
        $product = $this->product::all();
        $ordersItem = $this->orderItems::all();
        return view('Admin.order.order', compact('customer', 'orders', 'product', 'ordersItem'));
    }

    public function view($id){
        $totalAll = 0;
        $order = '';
        $customer = '';
        foreach ($this->orders::where('id', $id)->get() as $ItemOrder){
            $order = $ItemOrder;
            foreach ($this->customer::where('id', $ItemOrder->customer_id)->get() as $ItemCustomer){
                $customer = $ItemCustomer;
            }
        }
        $ordersItem = $this->orderItems::all();
        $product = $this->product::all();
        return view('Admin.order.order_view' , compact('order', 'customer','ordersItem','product', 'totalAll'));
    }
}
