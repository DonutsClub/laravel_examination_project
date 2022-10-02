<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CountryShowRequest extends ValidationRequest
{
    /**
     * Determine if the usernew CountryShowRequest($country) is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public static array $rules = [
        'id' => 'required|integer|min:0',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return self::$rules;
    }

    public function messages()
    {
        return [
            'id.required' => 'Id is required',
            'id.integer' => 'Id must be an integer',
            'id.min' => 'Id must be bigger that 0',
        ];
    }


}
