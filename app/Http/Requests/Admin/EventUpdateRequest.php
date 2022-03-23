<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EventUpdateRequest extends FormRequest
{
    

    public function rules()
    {
        $event = $this->event;
       
        return [
            'event_type' =>'required',
            'amount' => 'required',
            
        ];
        
    }
}

