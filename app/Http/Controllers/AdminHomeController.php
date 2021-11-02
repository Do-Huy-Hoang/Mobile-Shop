<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(){
        if (Gate::allows('is_admin')){
            return view('Admin.Home');
        }else{
            abort(403);
        }
    }
}
