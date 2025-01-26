<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
{
    public function rules() {
        return [
            'name' => 'required|string|min:5',
            'description' => 'nullable|string'
        ];
    }
}
