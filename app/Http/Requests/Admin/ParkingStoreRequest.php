<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ParkingStoreRequest extends FormRequest
{    
    
    public function rules()
    {
        return [
            'parking_name' =>'required',
            'vehicle_name' => 'required',            
            'amount'=>'required'            
        ];
    }
}
