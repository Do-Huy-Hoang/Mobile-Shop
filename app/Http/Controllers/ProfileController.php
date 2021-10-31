<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UserAddResquet;
use App\Product;
use App\Settings;
use App\Sliders;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    protected $customer;
    protected $user;
    protected $slider;
    protected $category;
    protected $product;
    protected $settings;
    public function __construct(Customer $customer, User $user, Sliders $slider, Category $category, Product  $product , Settings $settings)
    {
        $this->middleware('auth');
        $this->customer = $customer;
        $this->user = $user;
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
        $this->settings = $settings;
    }

    public function profile(){
        $settings = $this->settings::all();
        $user = $this->user::find(auth()->id());
        $cust = $this->customer->where('user_id',auth()->id())->get();
        $category = $this->category::all();
        $product = $this->product::all();
        foreach ($cust as $item){
            $customers = ( $item);
        }

        return view('Home.Profile.information', compact('user', 'customers', 'category', 'product','settings'));
    }

    public function profileupdate($id, Request $request){
        try {
            DB::beginTransaction();
            $this->customer::find($id)->update([
                'name'=> $request->name_customer,
                'gender'=>$request->gender,
                'birthday'=>$request->birthday,
                'address'=> $request->address
            ]);
            DB::commit();
            return redirect()->route('profile')->with('toast_success','Profile Update Successfully!');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('profile')->with('toast_error','Profile Update Error !');
        }
    }


    public function  email(Request $request){
        $settings = $this->settings::all();
        $category = $this->category::all();
        $user = $this->user::find(auth()->id());
        $error = false;
        if ($request->confirm == ''){
            $confirm = false;
        }else{
            if (Hash::check($request->password, $user->password)){
                $confirm = true;
            }else{
                $confirm = false;
                $error = true;
            }
        }
        return view('Home.Profile.UpdateEmail', compact('user', 'confirm', 'error', 'category','settings'));
    }

    public function EmailUpdate($id,UserAddResquet $request){
        try {
            DB::beginTransaction();
            $this->user::find($id)->update([
                'email' => $request->email,
            ]);
            DB::commit();
            return redirect()->route('profile')->with('toast_success','Email Update Successfully!');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('profile')->with('toast_error','Email Update Error !');
        }
    }

    public function  phone(Request $request){
        $settings = $this->settings::all();
        $category = $this->category::all();
        $customer = $this->customer::where('user_id',auth()->id())->get();
        foreach ($customer as $item){
            $customers = $item;
        }
        $error = false;
        if ($customers->phone == ''){
            $confirm = true;
        }else{
            if ($request->confirm == ''){
                $confirm = false;
            }else{
                if($customers->phone == $request->phone_confirm){
                    $confirm = true;
                }else{
                    $confirm = false;
                    $error = true;
                }
            }
        }

        return view('Home.Profile.UpdatePhone', compact('customers', 'confirm', 'error', 'category','settings'));
    }

    public function PhoneUpdate($id,CustomerRequest $request){
        try {
            DB::beginTransaction();
            $this->customer::find($id)->update([
                'phone' => $request->phone,
            ]);
            DB::commit();
            return redirect()->route('profile')->with('toast_success','Phone Update Successfully!');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('profile')->with('toast_error','Phone Update Error !');
        }
    }

    public function PasswordIndex(){
        $settings = $this->settings::all();
        $category = $this->category::all();
        $error = false;
        $password_check = false;
        $user = $this->user::find(auth()->id());
        return view('Home.Profile.UpdatePassword', compact('error', 'password_check','user','category','settings'));
    }

    public function PasswordUpdate($id,Request $request){
        $user = $this->user::find(auth()->id());
        $error = false;
        $password_check = false;
        if (Hash::check($request->password, $user->password)){
            if ($request->password_new == $request->password_confirm){
                try {
                    DB::beginTransaction();
                    $this->user::find($id)->update([
                        'password' => Hash::make($request->password_new),
                    ]);
                    DB::commit();
                    return redirect()->route('password.index')->with('toast_success','Password Update Successfully!');
                }catch (\Exception $exception){
                    DB::rollBack();
                    Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
                    return redirect()->route('password.index')->with('toast_error','Password Update Error !');
                }
            }else{
                $password_check = true;
                return view('Home.Profile.UpdatePassword', compact('error','password_check', 'user'));
            }
        }else{
            $error = true;
            return view('Home.Profile.UpdatePassword', compact('error', 'password_check', 'user'));
        }
    }
}
