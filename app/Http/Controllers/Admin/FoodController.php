<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FoodStoreRequest;
use App\Http\Requests\Admin\FoodUpdateRequest;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(){
        $q = request()->input('q');
        if($q)
        {
            $foods = Food::where('name','like',"%{$q}%")->orderBy('id', 'desc')->paginate(12);
        }
        else{
            $foods = Food::orderBy('name','desc')->paginate('12');
        }
        return view('admin.food.index',compact('foods'));
    }

    public function create(){
        return view('admin.food.create');
    }

    public function store(FoodStoreRequest $request){
        $data = $request->validated();
       

        Food::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'amount' => $data['amount']
            
            ]);

        return redirect()->route('food.index')->with('success', 'Food has been created successfuly!');
    }

    

    
    public function edit(Food $food){
        return view('admin.food.edit',compact('food'));
    }

    public function update(Food $food,FoodUpdateRequest $request){
        $data=$request->validated();
        
        $food->update($data);
        return redirect()->route('food.index')->with('success', 'Food has been updated successfuly!');
    
    }

    public function delete(Food $food){
       
        return view('admin.food.delete',compact('food'));
    }

    public function destroy(Food $food){
        $food->delete();
        return redirect()->route('food.index')->with('success', 'Food has been deleted successfuly!');
    }
}
