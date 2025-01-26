<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookingRequest extends FormRequest
{
    public function rules() {
        return [
            'room_id' => 'required|string',
            'start_date' => 'required|string',
            'start_time' => 'required|string',
        ];
    }
}
