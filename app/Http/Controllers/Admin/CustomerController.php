<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerUpdateRequest;
use App\Models\Role;
use App\Models\User; 
use Illuminate\Http\Request;
 
class CustomerController extends Controller
{
    public function index(){
 
        $q = request()->input('q');
        if($q)
        {
            $customers = User::where('role_id',3)->where('name','like',"%{$q}%")->orderBy('id', 'desc')->paginate(12);
        }
        else{
        $customers = User::where('role_id',3)->orderBy('id','desc')->paginate('12');
        }
        
        
        return view('admin.customer.index',compact('customers'));
    }
    


    


    public function edit(User $customer){
        return view('admin.customer.edit',compact('customer'));
    }

    public function update(User $customer,CustomerUpdateRequest $request){
        $data=$request->validated();
        if($request->input('password')){
            $data['password'] = Hash::make($request->input('password'));
        }else{$data['password'] = $customer->password;}

        
        $customer->update($data);
        return redirect()->route('customer.index')->with('success', 'Customer details has been updated successfuly!');
    
    }

    
    public function delete(User $customer){
       
        return view('admin.customer.delete',compact('customer'));
    }

    public function destroy(User $customer){
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer details has been deleted successfuly!');
    }

}