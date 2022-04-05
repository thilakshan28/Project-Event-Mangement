<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ParkingStoreRequest extends FormRequest
{

    public function rules()
    {
        return [
            'parking_name' =>'required',
            'size' => 'required',
            'amount'=>'required',
            'nearby' => 'required',
            'description' => 'required'
        ];
    }
}
