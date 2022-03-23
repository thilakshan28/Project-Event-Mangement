<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ParkingUpdateRequest extends FormRequest
{
    

    public function rules()
    {
        $parking = $this->parking;
       
        return [
            'parking_name' =>'required',
            'vehicle_name' =>'required',
            'amount'=>'required'
        ];
        
    }
}

