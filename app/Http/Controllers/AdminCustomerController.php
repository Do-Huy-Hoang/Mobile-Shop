<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    private $customer;
    public function __construct(Customer $customer){
        $this->customer = $customer;
    }
    public function index(){
        $customer = $this->customer->latest()->paginate(5);
        return view('Admin.customer.index', compact('customer'));
    }
}
