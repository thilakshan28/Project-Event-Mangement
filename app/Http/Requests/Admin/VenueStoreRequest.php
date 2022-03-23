<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VenueStoreRequest extends FormRequest
{    
    
    public function rules()
    {
        return [
            'name' =>'required',
            'accommodation'=>'required',
            'address'=>'required'            
        ];
    }
}
