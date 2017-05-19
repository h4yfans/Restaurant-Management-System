<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST': {
                return [
                    'name'         => 'required',
                    'profession'   => 'required',
                    'email'        => 'required|unique:users',
                    'start_date'   => 'required',
                    'mobile_phone' => 'required|max:15',
                    'address'      => 'required',
                    'password'     => 'required'
                ];
            }
                break;
            case 'PATCH': {
                return [
                    'name'         => 'required',
                    'profession'   => 'required',
                    'email'        => 'required',
                    'start_date'   => 'required',
                    'mobile_phone' => 'required|max:15',
                    'address'      => 'required',
                ];
            }
                break;
            default:
                break;
        }
    }


    public function messages()
    {
        return [
            'name.required'         => 'Lütfen ismi giriniz',
            'profession.required'   => 'Lütfen ünvanı giriniz',
            'profession.max'        => 'Lütfen 20 karakteri geçmeyiniz',
            'start_date.required'   => 'Personelin başlangıç tarihini giriniz',
            'mobile_phone.required' => 'Lütfen cep telefonunu giriniz',
            'address.required'      => 'Lütfen personelin adresini giriniz',
            'password.required'     => 'Lütfen şifre seçiniz',
            'email.required'        => 'Lütfen email adresinizi giriniz'
        ];
    }
}
