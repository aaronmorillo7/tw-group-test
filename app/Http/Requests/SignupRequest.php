<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    public function rules() {
        return [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'genre' => 'required|string|in:f,m',
            'birth_date' => 'required|string', 
            'phone' => 'nullable|string', 
            'password' => "required|string|min:8|max:20|confirmed|regex:/^(?=.*[!@#$%^&*.]).+$/",
        ];
    }
}
