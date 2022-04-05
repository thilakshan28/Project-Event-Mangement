<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderStoreRequest;
use App\Http\Requests\Admin\OrderUpdateRequest;
use App\Models\Order;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Meal;
use App\Models\Parking;
use App\Models\Travel;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('event','park','facility','manager','customer','venue')->orderBy('id', 'desc')->paginate(12);
        return view('admin.order.index',compact('orders'));
    }

    public function create(){
        $events =  Event::pluck('event_type','id')->toArray();
        $venues =  Venue::all();
        $foods =  Meal::all();
        $facilities =  Facility::pluck('name','id')->toArray();
        $facilities[''] ='------------Choose-----------';
        $travels =  Travel::pluck('vehicle_type','id')->toArray();
        $travels[''] ='------------Choose-----------';
        $parkings= Parking::all();

        return view('admin.order.create',compact('events','venues','foods','facilities','travels'));
    }

    public function dropdown(Request $request){
        $parkings= Parking::all();
        foreach($parkings as $i=>$parking){
            if(in_array($request->venue,explode(',',$parking->nearby))){
            $nearby[$i] = $parking;
            }
        }
        return response()->json($nearby);

    }

    public function store(OrderStoreRequest $request){
        $data = $request->validated();

        if(date("d/m/Y")<=$data['startdate'] && date("d/m/Y")<=$data['enddate'] ){
        $order= Order::create([
            'customer_id' => Auth::user()->id,
            'event_id' => $data['event_id'],
            'venue_id' =>$data['venue_id'],
            'startdate' => $data['startdate'],
            'starttime' =>$data['starttime'],
            'enddate' => $data['enddate'],
            'endtime' => $data['endtime'],
            'status' => 'Pending',
            'travel_id'=>$data['travel_id'],
            'park_id'=>$data['park_id'],
            'facility_id'=>$data['facility_id'],
        ]);

        if($request->input('meal_ids') != null){
            foreach($data['meal_ids'] as $i=>$meal_id){
                if($meal_id == null){
                    continue;
                }
                $order->meals()->attach([$meal_id =>['date' => $data['dates'][$i],'when'=>$data['whens'][$i]]]);
            }
        }
        return redirect()->route('order.index')->with('success', 'Order has been created successfuly!');
    }else{
        return redirect()->back()->with('error','You are Date was wrong.Please check your Date !');}
}

public function show(Order $order){
    return view('admin.order.show',compact('order'));
}

public function edit(Order $order){
        $order->load('meals');
        $events =  Event::pluck('event_type','id')->toArray();
        $venues =  Venue::all();
        $foods =  Meal::all();
        $facilities =  Facility::pluck('name','id')->toArray();
        $facilities[''] ='------------Choose-----------';
        $travels =  Travel::pluck('vehicle_type','id')->toArray();
        $travels[''] ='------------Choose-----------';
        $parkings= Parking::all();
    return view('admin.order.edit',compact('order','events','venues','foods','facilities','travels'));
}

public function update(Order $order,OrderUpdateRequest $request){
    $data=$request->validated();
    $order->update($data);

    if($request->input('meal_ids') != null){
        $items = [];
        foreach($data['meal_ids'] as $i=>$meal_id){
            if($meal_id == null){
                continue;
            }
            $items[$meal_id] = ['date' => $data['dates'][$i],'when'=>$data['whens'][$i]];
        }
        if(count($items)){
            $order->meals()->sync($items);
        }
    }
    Order::whereId($order->id)->update(['status' => 'Pending']);

    return redirect()->route('order.index')->with('success', 'Order has been updated successfuly!');
}

public function delete(Order $order){
    return view('admin.order.delete',compact('order'));
}

public function destroy(Order $order){
    $order->delete();
    return redirect()->route('order.index')->with('success', 'Order has been deleted successfuly!');
}

public function change(Order $order){
    $managers=User::where('role_id',2)->pluck('name','id')->toArray();
    $managers['']='---------------Choose Manager---------';
    return view('admin.order.change',compact('order','managers'));
}

public function changeupdate(Order $order,Request $request){
    $request->validate([
        'status' => 'required',
        'manager_id'=> 'required',
    ]);
    Order::whereId($order->id)->update(['status' => $request->status,'manager_id' => $request->manger_id]);

    return redirect()->route('order.show',$order->id)->with('success', 'Order Status has been updated successfuly!');
}
}
