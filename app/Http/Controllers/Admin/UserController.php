<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
 
        $q = request()->input('q');
        if($q)
        {
            $users = User::where('role_id','!=',3)->where('name','like',"%{$q}%")->orWhere('id','like',"%{$q}%")->with('role')->orderBy('id', 'desc')->paginate(12);
        }
        else{
            $users = User::where('role_id','!=',3)->orderBy('id','desc')->paginate('12');
        }

        return view('admin.user.index',compact('users'));
    }

    public function create(){
        $roles =  Role::where('id','!=',3)->pluck('name','id')->toArray();
        $roles[''] = '--------------Choose Your Role------';
        return view('admin.user.create',compact('roles'));
    }

    public function store(UserStoreRequest $request){
        $data = $request->validated();
       

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id'=>$data['role_id'],
            'phone'=>$data['phone'],
            'password' =>Hash::make($data['password']),
        ]);

        return redirect()->route('user.index')->with('success', 'User has been created successfuly!');
    }

    public function show(User $user){
        return view('admin.user.show',compact('user'));
    }

    public function edit(User $user){
        $roles =  Role::where('id','!=',3)->pluck('name','id')->toArray();
        $roles[''] = '--------------Choose Your Role------';
        return view('admin.user.edit',compact('user','roles'));
    }

    public function update(User $user,UserUpdateRequest $request){
        $data=$request->validated();
        if($request->input('password')){
            $data['password'] = Hash::make($request->input('password'));
        }else{$data['password'] = $user->password;}

        
        $user->update($data);
        return redirect()->route('user.index')->with('success', 'User  details has been updated successfuly!');
    
    }

    public function delete(User $user){
       
        return view('admin.user.delete',compact('user'));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User details has been deleted successfuly!');
    }
}
