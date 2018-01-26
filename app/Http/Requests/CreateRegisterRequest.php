<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        //return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'regis_cardUID' => 'required|max:10',
            'regis_memberId' => 'required|max:10',
            'regis_name' => 'required|max:50',
            'regis_lastname' => 'required|max:50'
        ];
    }

    public function messages(){
        return [
            'regis_cardUID.required' => 'cardUID is required.',
            'regis_cardUID.max' => 'cardUID may not be greater than 10 charactes.',
            'regis_memberId.required' => 'memberId is required.',
            'regis_memberId.max' => 'memberId may not be greater than 10 characters.',
            'regis_name.required' => 'firstname is required.',
            'regis_name.max' => 'firstname may not be greater than 50 characters.',
            'regis_lastname.required' => 'lastname is required.',
            'regis_lastname.max' => 'lastname may not be greater than 50 characters.'
        ];
    }
}
