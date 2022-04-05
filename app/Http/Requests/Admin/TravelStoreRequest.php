<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TravelStoreRequest extends FormRequest
{

    public function rules()
    {
        return [
            'vehicle_type' =>'required',
            'vehicle_number' => 'required',
            'peoples'=>'required',
            'amount'=>'required'
        ];
    }
}
