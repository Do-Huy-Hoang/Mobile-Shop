<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\UserAddResquet;
use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    private $user;
    private $roles;
    private $customer;
    public function __construct(User $user, Roles $roles, Customer $customer){
        $this->user = $user;
        $this->roles = $roles;
        $this->customer = $customer;
    }

    public function index(Request $request){
        if ($request->search != null){
            $user = $this->user::where('name','like', '%'.$request->search.'%')->latest()->paginate(10);
        }else{
            $user = $this->user->latest()->paginate(10);
        }
        return view('Admin.user.index', compact('user'));
    }

    public function edit($id){
        $userUpdate = $this->user::find($id);
        $role = $this->roles::all();
        $roleOfUser = $userUpdate->roles;
        return view('Admin.user.edit',compact('userUpdate','role','roleOfUser'));
    }

    public function update($id, Request $request){
        try {
            DB::beginTransaction();
            $user = $this->user::find($id)->update([
                'is_admin'=>$request->is_admin,
            ]);
            $user = $this->user::find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('user.index')->with('toast_success','User Updated Successfully!');;
        }catch (\Exception $exception){
            DB::rollBack();
            Log::channel('daily')->error('Message: '.$exception->getMessage().' Line :'.$exception->getLine());
            return redirect()->route('user.index')->with('toast_error','User Updated Error !');
        }
    }

    public function delete($id, Request $request){
        try {
            DB::beginTransaction();
            $user = $this->user::find($id);
            $user->roles()->detach($request->role_id);
            $this->user::find($id)->delete();
            DB::commit();
            return redirect()->route('user.index')->with('toast_success', 'The user deleted Successfully!');;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::channel('daily')->error('Message: ' . $exception->getMessage() . ' Line :' . $exception->getLine());
            return redirect()->route('user.index')->with('toast_error', 'The user deleted error');
        }
    }
}
