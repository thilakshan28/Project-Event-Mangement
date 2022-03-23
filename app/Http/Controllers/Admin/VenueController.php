<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VenueStoreRequest;
use App\Http\Requests\Admin\VenueUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Venue; 

class VenueController extends Controller
{
    public function index(){
        $q = request()->input('q');
        if($q)
        {
            $venues = Venue::where('name','like',"%{$q}%")->orderBy('id', 'desc')->paginate(12);
        }
        else{
            $venues = Venue::orderBy('name','desc')->paginate('12');
        }
        return view('admin.venue.index',compact('venues'));
    }

    public function create(){
        return view('admin.venue.create');
    }

    public function store(VenueStoreRequest $request){
        $data = $request->validated();
       

        Venue::create([
            'name' => $data['name'],
            'accommodation' => $data['accommodation'],
            'address' => $data['address']
            
            ]);

        return redirect()->route('venue.index')->with('success', 'Venue has been created successfuly!');
    }

    

    
    public function edit(Venue $venue){
        return view('admin.venue.edit',compact('venue'));
    }

    public function update(Venue $venue,VenueUpdateRequest $request){
        $data=$request->validated();
        
        $venue->update($data);
        return redirect()->route('venue.index')->with('success', 'Venue has been updated successfuly!');
    
    }

    public function delete(Venue $venue){
       
        return view('admin.venue.delete',compact('venue'));
    }

    public function destroy(Venue $venue){
        $venue->delete();
        return redirect()->route('venue.index')->with('success', 'Venue has been deleted successfuly!');
    }


}
