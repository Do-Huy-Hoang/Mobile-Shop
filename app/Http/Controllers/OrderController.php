<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\OrderItems;
use App\Orders;
use App\Product;
use App\Settings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    protected $customer;
    protected $category;
    protected $product;
    protected $user;
    protected $orders;
    protected $order_Items;
    protected $settings;

    public function __construct(Customer $customer, Product $product, Category $category, User $user, Orders $orders, OrderItems $order_Items, Settings $settings)
    {
        $this->middleware('auth');
        $this->customer = $customer;
        $this->user = $user;
        $this->category = $category;
        $this->product = $product;
        $this->orders = $orders;
        $this->order_Items = $order_Items;
        $this->settings = $settings;
    }
    public function MyOrder(){
        $category = $this->category::all();
        $settings = $this->settings::all();
        $customer = $this->customer::where('user_id', auth()->id())->get();
        foreach ($customer as $item){
            $customers = $item;
        }
        $orders = $this->orders::latest()->where('customer_id', $customers->id)->get();
        $ordersItems = $this->order_Items::all();
        $product = $this->product::all();
        return view('Home.Profile.MyOrder', compact('category','orders','ordersItems','product', 'settings'));
    }

    public function index()
    {
        $carts = session()->get('cart');
        $totalAll = 0;
        if ($carts != []) {
            $settings = $this->settings::all();
            $category = $this->category::all();
            $customer = $this->customer::where('user_id', auth()->id())->get();
            $user = $this->user::find(auth()->id());
            $carts = session()->get('cart');
            foreach ($carts as $item) {
                $totalAll = $totalAll + ($item['price'] * $item['quantity']);
            }
            return view('Home.order', compact('category', 'carts', 'totalAll', 'customer', 'user', 'settings'));
        } else {
            abort(404);
        }
    }

    public function CreateOrder($id)
    {
        try {
            DB::beginTransaction();
            $cus = $this->customer::where('user_id', $id)->get();
            foreach ($cus as $item) {
                $customer = $item;
            }
            $carts = session()->get('cart');
            $orders = $this->orders::create([
                'customer_id' => $customer->id,
                'status' => 'Item has been ordered',
            ]);
            foreach ($carts as $cartsItem) {
                $orders->Items()->create([
                    'order_id' => $orders->id,
                    'product_id' => $cartsItem['product_id'],
                    'quantity' => $cartsItem['quantity'],
                ]);
            }
            session()->flush('cart');
            $category = $this->category::all();
            $customer = $this->customer::where('user_id', auth()->id())->get();
            foreach ($customer as $item){
                $customers = $item;
            }
            $orders = $this->orders::latest()->where('customer_id', $customers->id)->get();
            $ordersItems = $this->order_Items::all();
            $product = $this->product::all();
            DB::commit();
            return view('Home.Profile.MyOrder', compact('category','orders','ordersItems','product'));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::channel('daily')->error('Message: ' . $exception->getMessage() . ' Line :' . $exception->getLine());
            return redirect()->route('cart')->with('toast_error', 'Order failed !');
        }
    }
}
