<?php

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use App\Settings;
use App\Sliders;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $slider;
    protected $category;
    protected $product;
    protected $settings;
    public function __construct(Sliders $slider , Category $category, Product $product, Settings $settings)
    {
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
        $this->settings = $settings;
    }
    public function index(){
        $count = 0;
        $slider = $this->slider::all();
        $category = $this->category::all();
        $product = $this->product::latest()->get();
        $settings = $this->settings::all();
        return view('Home.index',compact('slider', 'count', 'category', 'product', 'settings'));
    }


    public function about_us(){
        $category = $this->category::all();
        $settings = $this->settings::all();
        return view('Home.aboutus', compact('category','settings'));
    }
}
