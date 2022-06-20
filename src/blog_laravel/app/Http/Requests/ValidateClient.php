<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateClient extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống!',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ và tên',
            'email' => 'email',
            'phone' => 'Số điện thoại',
        ];
    }
}
