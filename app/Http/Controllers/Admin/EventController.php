<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventStoreRequest;
use App\Http\Requests\Admin\EventUpdateRequest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    public function index(){
        $q = request()->input('q');
        if($q){
            $events = Event::where('event_type','like',"%{$q}%")->orderBy('id', 'desc')->paginate(12);
        }
        else{
            $events = Event::orderBy('id','desc')->paginate('12');
        }
        return view('admin.event.index',compact('events'));
        
    }

    public function create(){
        $managers =  User::where('role_id',2)->pluck('name','id')->toArray();
        $managers[''] = '--------------Choose Manager------';
        return view('admin.event.create',compact('managers'));
    }


    public function store(EventStoreRequest $request){
        $data = $request->validated();
       
        Event::create([
            'event_type' => $data['event_type'],
            'amount' => $data['amount'],
        ]);

        return redirect()->route('event.index')->with('success', 'Event has been created successfuly!');
    }


    public function show(Event $event){
        return view('admin.event.show',compact('event'));
    }

    public function edit(Event $event){
        $managers =  User::where('role_id',2)->pluck('name','id')->toArray();
        $managers[''] = '--------------Choose Manager------';
        return view('admin.event.edit',compact('event','managers'));
    }

    public function update(Event $event,EventUpdateRequest $request){
        $data=$request->validated();
        
        $event->update($data);
        return redirect()->route('event.index')->with('success', 'Event has been updated successfuly!');
    
    }


    public function delete(Event $event){
        return view('admin.event.delete',compact('event'));
    }

    public function destroy(Event $event){
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event has been deleted successfuly!');
    }

    public function add(Event $event){
        $date= request()->input('date');
        $time= request()->input('time');     
        $user_id= Auth::user()->id;
       
        $event->customers()->attach([$event->id=>['customer_id'=>$user_id, 'date'=>$date, 'time'=>$time]]); 

        return redirect()->back()->with('success','You comment is Published');

    }
    


}

