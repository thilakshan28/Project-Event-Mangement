<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class FoodUpdateRequest extends FormRequest
{
    

    public function rules()
    {
        $food = $this->food;
       
        return [
            'name' =>'required',
            'type'=>'required',
            'amount'=>'required'
        ];
        
    }
}

