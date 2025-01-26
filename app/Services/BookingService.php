<?php

namespace App\Services;

use App\Models\Booking;
use Carbon\Carbon;

class BookingService
{
    public function checkIfDateIsAvailable($bookingData) {
        $startDate = Carbon::parse($bookingData['start_date']);

        $currentStartDate = Carbon::now();
        $currentStartDate->year = $startDate->year;
        $currentStartDate->month = $startDate->month;
        $currentStartDate->day = $startDate->day;
        $currentStartDate->hour = $startDate->hour;
        $currentStartDate->minute = $startDate->minute;
        $currentStartDate->second = 0;

        $endDate = $currentStartDate->copy()->addHour(1)->format('Y-m-d H:i:00');
        $currentStartDate = $currentStartDate->format('Y-m-d H:i:00');

        $bookings = Booking::where('room_id', $bookingData['room_id'])->whereIn('status', [Booking::APPROVED, Booking::PENDING])->whereBetween('start_date', [$currentStartDate, $endDate])->get();

        return !count($bookings);
    }
}