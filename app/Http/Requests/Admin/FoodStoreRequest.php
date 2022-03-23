<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FoodStoreRequest extends FormRequest
{    
    
    public function rules()
    {
        return [
            'name' =>'required',
            'type'=>'required',
            'amount'=>'required'            
        ];
    }
}
