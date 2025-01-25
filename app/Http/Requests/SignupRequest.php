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
            'age' => 'required|numeric',
            'genre' => 'required|string|in:m,f|max:1',
            'birth_date' => 'required|string', 
            'phone' => 'required|string', 
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
