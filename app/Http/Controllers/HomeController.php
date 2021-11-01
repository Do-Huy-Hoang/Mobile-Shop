<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Http\Requests\CustomerRequest;
use App\Product;
use App\Sliders;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    protected $customer;
    protected $user;
    protected $slider;
    protected $category;
    protected $product;
    public function __construct(Customer $customer, User $user, Sliders $slider, Category $category, Product  $product)
    {
        $this->middleware('auth');
        $this->customer = $customer;
        $this->user = $user;
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
    }

    public function index(){
        $customer = $this->customer::all();
        $count = false;
        foreach ($customer as $item){
            if ($item['user_id'] == auth()->id()){
                $count = true;
            }
        }
        if ($count == false){
            $this->customer::create([
                'user_id' => auth()->id()
            ]);
        }
        return redirect()->route('Home.index');
    }
}
