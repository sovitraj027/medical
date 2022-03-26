<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    
    public function rules(): array
    {  
            $rules=[
                'name'=>'required|string',
                'email'=>'required|email|unique:users|max:30',
                'password' => 'required|min:6',
                'profile_photo' => ['required'],
                'phone_number' => ['required'],
                ];
                if (in_array($this->method(), ['PUT', 'PATCH'])) {
                    $rules['email'] = ['email'];
                }
              return $rules;
        
    }
}
