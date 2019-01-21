<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class RegisterStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Wajib Diisi',
            'name.max' => 'Nama Maksimal 255 Karakter ',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Harus Berupa Email ex: name@domain.com',
            'email.max' => 'Email Maksimal 255 Karakter ',
            'email.unique' => 'Email Telah Digunakan ',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password Minimal 6 Karakter',
            'password.confirmed' => 'Password Tidak Cocok',

        ];
    }
}
