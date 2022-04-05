<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TravelUpdateRequest extends FormRequest
{


    public function rules()
    {
        $travel = $this->travel;

        return [
            'vehicle_type' =>'required',
            'vehicle_number' => 'required',
            'peoples'=>'required',
            'amount'=>'required'
        ];

    }
}

