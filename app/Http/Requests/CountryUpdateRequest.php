<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryUpdateRequest extends ValidationRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|integer|min:0',
            'alias' => 'required|string|max:2|min:2',
            'name' => 'required|string|max:64|min:1',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Id is required',
            'id.integer' => 'Id must be an integer',
            'id.min' => 'Id must be bigger that 0',

            'alias.required' => 'Alias is required',
            'alias.string' => 'Alias must be a string',
            'alias.min' => 'Alias must be length of 2',
            'alias.max' => 'Alias must be length of 2',

            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.min' => 'Name must be bigger than 1',
            'name.max' => 'Name must be less than 64',
        ];
    }
}
