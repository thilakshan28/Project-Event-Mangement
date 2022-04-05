<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ParkingStoreRequest;
use App\Http\Requests\Admin\ParkingUpdateRequest;
use App\Models\Parking;
use App\Models\Venue;
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
        $venues = Venue::all();
        return view('admin.parking.create',compact('venues'));
    }



    public function store(ParkingStoreRequest $request){
        $data = $request->validated();

        Parking::create([
            'parking_name' => $data['parking_name'],
            'size' => $data['size'],
            'amount' => $data['amount'],
            'nearby' => implode(',',(array)$data['nearby']),
            'description' =>$data['description']
             ]);

        return redirect()->route('parking.index')->with('success', 'Parking has been created successfuly!');
    }

    public function show(Parking $parking){
        $venues = Venue::all();
        $select= explode(',',$parking->nearby);
        return view('admin.parking.show',compact('parking','venues','select'));
    }


    public function edit(Parking $parking){
        $venues = Venue::all();
        $select= explode(',',$parking->nearby);
        return view('admin.parking.edit',compact('parking','venues','select'));
    }

    public function update(Parking $parking,ParkingUpdateRequest $request){
        $data=$request->validated();
        $data['nearby'] = implode(',',(array)$data['nearby']);
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
