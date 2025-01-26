<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    const REJECTED = 0;
    const PENDING = 1;
    const APPROVED = 2; 

    protected $fillable = [
        'user_id',
        'room_id',
        'start_date',
        'start_time',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function getStatusAttribute($status) {
        if ($status === self::PENDING) return 'pending';
        if ($status === self::APPROVED) return 'approved';

        return 'rejected';
    }
}
