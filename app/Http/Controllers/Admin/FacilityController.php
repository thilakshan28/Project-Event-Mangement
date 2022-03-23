<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FacilityStoreRequest;
use App\Http\Requests\Admin\FacilityUpdateRequest; 
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index(){
        $q = request()->input('q');
        if($q)
        {
            $facilities = Facility::where('type','like',"%{$q}%")->orderBy('id', 'desc')->paginate(12);
        }
        else{
            $facilities = Facility::orderBy('type','desc')->paginate('12');
        }
        return view('admin.facility.index',compact('facilities'));
    }

    public function create(){
        return view('admin.facility.create');
    }

    public function store(FacilityStoreRequest $request){
        $data = $request->validated();
       

        Facility::create([
            'type' => $data['type'],
            'name' => $data['name'],
            'duration' => $data['duration'],
            'amount' => $data['amount']
            
            ]);

        return redirect()->route('facility.index')->with('success', 'Facility has been created successfuly!');
    }

    

    
    public function edit(Facility $facility){
        return view('admin.facility.edit',compact('facility'));
    }

    public function update(Facility $facility,FacilityUpdateRequest $request){
        $data=$request->validated();
        
        $facility->update($data);
        return redirect()->route('facility.index')->with('success', 'Facility has been updated successfuly!');
    
    }

    public function delete(Facility $facility){
       
        return view('admin.facility.delete',compact('facility'));
    }

    public function destroy(Facility $facility){
        $facility->delete();
        return redirect()->route('facility.index')->with('success', 'Facility has been deleted successfuly!');
    }
}
