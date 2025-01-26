<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Repositories\BookingRepository;
use App\Repositories\RoomRepository;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    protected $bookingRepository, $roomRepository, $bookingService;

    public function __construct(BookingRepository $bookingRepository, RoomRepository $roomRepository, BookingService $bookingService)
    {   
        $this->bookingRepository = $bookingRepository;
        $this->roomRepository = $roomRepository;
        $this->bookingService = $bookingService;
    }

    public function getBookings() {
        $user = Auth::user();
        $bookings = $user->hasRole('admin') ? $this->bookingRepository->getBookingsWithRoom() : $this->bookingRepository->getBookingsByUser($user->id);
        
        return  view('bookings.index', compact('bookings'));
    }

    public function updateStatus(UpdateBookingRequest $request, $id) {
        $this->bookingRepository->updateStatus($id, $request->validated()['status']);

        return redirect()->intended(route('bookings.index'));
    }

    public function createView() {
        $rooms = $this->roomRepository->all();
        return view('bookings.create', compact('rooms'));
    }

    public function create (CreateBookingRequest $request) {
        $data = $request->validated();
        $data['start_date'] = $data['start_date'] . ' ' . $data['start_time'] . ':00'; 
        unset($data['start_time']);

        if ($this->bookingService->checkIfDateIsAvailable($data)) {
            $data['status'] = Booking::PENDING;
            $data['user_id'] = Auth::user()->id;
    
            $this->bookingRepository->create($data);
    
            return redirect()->intended(route('bookings.index'));
        }

        return back()->withErrors([
            'date' => 'La fecha no esta disponible a esa hora.',
        ]);
    }
}
