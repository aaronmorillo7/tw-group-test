<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Http\Request;
use App\Repositories\RoomRepository;

class RoomController extends Controller
{
    protected $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {   
        $this->roomRepository = $roomRepository;
    }

    public function getRooms() {
        return view('admin.rooms.index', ['rooms' => $this->roomRepository->all()]);
    }

    public function create(CreateRoomRequest $request) {
        $this->roomRepository->create($request->validated());
        return redirect()->intended(route('rooms.index')); 
    }

    public function getRoom(Request $request, $id) {
        $room = $this->roomRepository->find($id);
        return $room ? view('admin.rooms.update', compact('room')) : redirect()->intended(route('rooms.index'));
 
    }

    public function update(UpdateRoomRequest $request, $id) {
        $this->roomRepository->update($id, $request->validated());

        return redirect()->intended(route('rooms.index'));
    }

    public function delete($id) {
        $this->roomRepository->delete($id);
        return redirect()->intended(route('rooms.index'));
    }
}
