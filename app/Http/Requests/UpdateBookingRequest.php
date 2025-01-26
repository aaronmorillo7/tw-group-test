<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
{
    public function rules() {
        return [
            'status' => 'required|string|in:rejected,approved',
        ];
    }
}
