<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
        return [
            'first_name' => 'required|max:70',
            'last_name' => 'required|max:70',
            'email' => 'required|email|max:70|unique:users,email,'.$this->customer->id,
            'phone' => 'required|max:20',
            'company' => 'required|max:70',
        ];
    }
}
