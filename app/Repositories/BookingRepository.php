<?php

namespace App\Repositories;

use App\Interfaces\BookingRepositoryInterface;
use App\Models\Booking;

class BookingRepository implements BookingRepositoryInterface
{
    protected $booking;

    public function __construct(Booking $booking) {
        $this->booking = $booking;
    }

    public function all() {
        return $this->booking->all();
    }

    public function find($id) {
        return $this->booking->find($id);
    }

    public function create(array $data) {
        return $this->booking->create($data);
    }

    public function update($id, array $data) {
        $booking = $this->find($id);
        $booking->update($data);
        return $booking;
    }

    public function delete($id) {
        return $this->booking->destroy($id);
    }

    public function getBookingsByRoom($id) {
        return $this->booking->whereRoomId($id)->get();
    }

    public function getBookingsWithRoom() {
        return $this->booking->with(['room', 'user'])->get();
    }

    public function updateStatus($id, $status) {
        $booking = $this->booking->find($id);
        $booking->update(['status' => $status == 'approved' ? Booking::APPROVED : Booking::REJECTED]);
        return $booking;
    }

    public function getBookingsByUser($id) {
        return $this->booking->where('user_id', $id)->with('room')->get();
    }
}