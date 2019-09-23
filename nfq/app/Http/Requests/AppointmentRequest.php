<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'customer_name' => 'required|alpha',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Please enter Your name for registration',
            'customer_name.alpha'  => 'Please enter correct name',
        ];
    }
}
