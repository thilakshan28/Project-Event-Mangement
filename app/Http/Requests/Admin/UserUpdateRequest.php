<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->user;
       
        return [
            'name' =>'required',
            'phone'=> 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
            'password' => 'nullable | confirmed | string | min:8',

        ];
        
    }
}

