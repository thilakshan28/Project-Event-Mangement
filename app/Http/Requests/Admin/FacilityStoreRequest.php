<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FacilityStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'type' =>'required',
            'name' =>'required',
            'duration'=>'required',
            'amount'=>'required'            
        ];
    }
}
