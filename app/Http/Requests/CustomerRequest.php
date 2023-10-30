<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomerRequest extends FormRequest
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
            'dni'       => [
                'required',
                Rule::unique('customers')->ignore($this->route('customer'))
            ],
            "id_reg"    => ['required', 'exists:regions,id_reg',],
            "id_com"    => ['required', 'exists:communes,id_com'],
            "email"    => [
                'required',
                'email',
                Rule::unique('customers')->ignore($this->route('customer'))
            ],
            "name"      => "required",
            "last_name" => "required",
            "address"   => "required",
            "date_reg"  => "required",
            "status"    => "required"
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Errores de Validación',
            'data'      => $validator->errors()
        ], 401));
    }
}
