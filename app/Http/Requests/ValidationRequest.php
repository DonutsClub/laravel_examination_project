<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ValidationRequest extends FormRequest
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

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->failed();
        $problem = key(reset($errors));

        if($problem == 'Integer' or $problem == 'String')
        {
            throw new HttpResponseException(response($validator->errors(), 415));
        }

        if($problem == 'Min' or $problem == 'Max')
        {
            throw new HttpResponseException(response($validator->errors(), 416));
        }

        if($problem == 'Required')
        {
            throw new HttpResponseException(response($validator->errors(), 422));
        }
    }
}
