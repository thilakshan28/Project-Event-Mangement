<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class VenueUpdateRequest extends FormRequest
{
    

    public function rules()
    {
        $venue = $this->venue;
       
        return [
            'name' =>'required',
            'accommodation'=>'required',
            'address'=>'required'
        ];
        
    }
}

