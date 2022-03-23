<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelStoreRequest;
use App\Http\Requests\Admin\TravelUpdateRequest;
use App\Models\Travel; 
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index(){
        $q = request()->input('q');
        if($q)
        {
            $travels = Travel::where('vehicle_name','like',"%{$q}%")->orderBy('id', 'desc')->paginate(12);
        }
        else{
            $travels = Travel::orderBy('vehicle_name','desc')->paginate('12');
        }
        return view('admin.travel.index',compact('travels'));
    }

    public function create(){
        return view('admin.travel.create');
    }

    public function store(TravelStoreRequest $request){
        $data = $request->validated();
       

        Travel::create([
            'vehicle_name' => $data['vehicle_name'],
            'vehicle_number' => $data['vehicle_number'],
            'peoples' => $data['peoples'],
            'amount' => $data['amount']
            
            ]);

        return redirect()->route('travel.index')->with('success', 'Travel has been created successfuly!');
    }

    

    
    public function edit(Travel $travel){
        return view('admin.travel.edit',compact('travel'));
    }

    public function update(Travel $travel,TravelUpdateRequest $request){
        $data=$request->validated();
        
        $travel->update($data);
        return redirect()->route('travel.index')->with('success', 'Travel has been updated successfuly!');
    
    }

    public function delete(Travel $travel){
       
        return view('admin.travel.delete',compact('travel'));
    }

    public function destroy(Travel $travel){
        $travel->delete();
        return redirect()->route('travel.index')->with('success', 'Travel has been deleted successfuly!');
    }


}
