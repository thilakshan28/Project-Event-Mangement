<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'event_id' =>'required',
            'venue_id' =>'required',
            'startdate'=>'required',
            'enddate'=>'required',
            'starttime'=>'required',
            'endtime'=>'required',
            'meal_ids'=>'nullable',
            'whens'=>'nullable',
            'dates'=>'nullable',
            'park_id'=>'nullable',
            'facility_id' =>'nullable',
            'travel_id'=>'nullable'
        ];
    }
}
