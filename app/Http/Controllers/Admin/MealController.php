<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FoodStoreRequest;
use App\Http\Requests\Admin\FoodUpdateRequest;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index(){
        $q = request()->input('q');
        if($q)
        {
            $foods = Meal::where('name','like',"%{$q}%")->orderBy('id', 'desc')->paginate(12);
        }
        else{
            $foods = Meal::orderBy('name','desc')->paginate('12');
        }
        return view('admin.food.index',compact('foods'));
    }

    public function create(){
        return view('admin.food.create');
    }

    public function store(FoodStoreRequest $request){
        $data = $request->validated();


        Meal::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'amount' => $data['amount'],
            'description' => $data['description']
            ]);

        return redirect()->route('food.index')->with('success', 'Food has been created successfuly!');
    }

    public function show(Meal $food){
        return view('admin.food.show',compact('food'));
    }

    public function edit(Meal $food){
        return view('admin.food.edit',compact('food'));
    }

    public function update(Meal $food,FoodUpdateRequest $request){
        $data=$request->validated();

        $food->update($data);
        return redirect()->route('food.index')->with('success', 'Food has been updated successfuly!');

    }

    public function delete(Meal $food){

        return view('admin.food.delete',compact('food'));
    }

    public function destroy(Meal $food){
        $food->delete();
        return redirect()->route('food.index')->with('success', 'Food has been deleted successfuly!');
    }
}
