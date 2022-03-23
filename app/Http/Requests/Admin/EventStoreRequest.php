<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{    
    
    public function rules()
    {
        return [
            'event_type' =>'required',
            'amount' =>'required',
            
            
        ];
    }
}
