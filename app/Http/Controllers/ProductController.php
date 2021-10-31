<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use App\Settings;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $category;
    protected $product;
    protected $productImage;
    protected $settings;
    public function __construct(Category $category, Product $product, ProductImage $productImage, Settings $settings)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->settings = $settings;
    }
    public function index($id, Request $request){
        $categoryList = '';
        $productList = '';
        $pp = false;
        if ($request->search == ''){
            if ($id == 0){
                $category = $this->category::all();
                $product = $this->product::latest()->paginate(12);
                $pp = true;
            }else{
                foreach ($this->product::where('category_id', $id)->get() as $item){
                    $productList = $item;
                }
                if ($productList == ''){
                    $category = $this->category::all();
                    $categoryList = $this->category::where('id_parent', $id)->get();
                    $product = $this->product::latest()->get();
                }else{
                    $category = $this->category::all();
                    $product = $this->product::latest()->where('category_id', $id)->get();
                }
            }
        }else{
                $category = $this->category::all();
                $product = $this->product::where('name', 'like', '%'.$request->search.'%')->get();
        }
        $settings = $this->settings::all();
        return view('Home.product', compact('category', 'product','categoryList', 'pp', 'settings'));
    }

    public function product_details($id){
        $count_1 = 2;
        $count_2 = 2;
        $settings = $this->settings::all();
        $category = $this->category::all();
        $product = $this->product::find($id);
        $productImage = $this->productImage::where('product_id', $product->id)->get();
        return view('Home.product_details', compact('category', 'product','productImage','count_1','count_2', 'settings'));
    }

    public function AddToCart($id){
       $product = $this->product::find($id);
        $cart = session()->get('cart');
       if (isset($cart[$id]) ){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
       }else{
           $cart[$id] = [
               'product_id'=>$product->id,
               'category_id'=>$product->category_id,
               'image' => $product->feature_img_path,
               'name' => $product->name,
               'price'=> $product->price,
               'quantity'=> 1,
           ];
       }
       session()->put('cart',$cart);
       return response()->json([
          'code' =>200,
          'message'=> 'success'
       ],200);
    }

    public function ShowCart(){
        $totalAll = 0;
        $settings = $this->settings::all();
        $category = $this->category::all();
        $carts = session()->get('cart');
        if ($carts != []){
            foreach ($carts as $item){
                $totalAll =  $totalAll + ($item['price']*$item['quantity']);
            }
        }
        return view('Home.shopping_cart', compact('carts', 'category', 'totalAll', 'settings'));
    }

    public function UpdateCart(Request $request){
        $totalAll = 0;
        $category = $this->category::all();
        if ($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            $carts = session()->get('cart');
            if ($carts != ''){
                foreach ($carts as $item){
                    $totalAll =  $totalAll + ($item['price']*$item['quantity']);
                }
            }
            $shopping_cart =  view('Home.shopping_cart', compact('carts','totalAll', 'category'))->render();
            return response()->json(['shopping_cart'=>$shopping_cart, 'code'=>200], 200);
        }
    }

    public function DeleteCart(Request $request){
        $totalAll = 0;
        $category = $this->category::all();
        if ($request->id ){
            $cart = session()->get('cart');
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            $carts = session()->get('cart');
            if ($carts != ''){
                foreach ($carts as $item){
                    $totalAll =  $totalAll + ($item['price']*$item['quantity']);
                }
            }
            $shopping_cart =  view('Home.shopping_cart', compact('carts','totalAll', 'category'))->render();
            return response()->json(['shopping_cart'=>$shopping_cart, 'code'=>200], 200);
        }
    }
}
