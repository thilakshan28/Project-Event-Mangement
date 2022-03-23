<?php

namespace App\Http\Controllers\Admin; 
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ParkingStoreRequest;
use App\Http\Requests\Admin\ParkingUpdateRequest;
use App\Models\Parking; 
use App\Models\Travel; 
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function index(){
        $q = request()->input('q');
        if($q)
        {
            $parkings = Parking::where('parking_name','like',"%{$q}%")->orderBy('id', 'desc')->paginate(12);
        }
        else{
            $parkings = Parking::orderBy('parking_name','desc')->paginate('12');
        }
        return view('admin.parking.index',compact('parkings'));
    }

    public function create(){
      
        return view('admin.parking.create'); 
    }

    

    public function store(ParkingStoreRequest $request){
        $data = $request->validated();
       

        Parking::create([
            'parking_name' => $data['parking_name'],
            'vehicle_name' => $data['vehicle_name'],
            'amount' => $data['amount']
            
            ]);

        return redirect()->route('parking.index')->with('success', 'Parking has been created successfuly!');
    }

    

    
    public function edit(Parking $parking){
        return view('admin.parking.edit',compact('parking'));
    }

    public function update(Parking $parking,ParkingUpdateRequest $request){
        $data=$request->validated();
        
        $parking->update($data);
        return redirect()->route('parking.index')->with('success', 'Parking has been updated successfuly!');
    
    }

    public function delete(Parking $parking){
       
        return view('admin.parking.delete',compact('parking'));
    }

    public function destroy(Parking $parking){
        $parking->delete();
        return redirect()->route('parking.index')->with('success', 'Parking has been deleted successfuly!');
    }

}
