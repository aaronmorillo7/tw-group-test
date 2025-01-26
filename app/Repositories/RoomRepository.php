<?php

namespace App\Repositories;

use App\Interfaces\RoomRepositoryInterface;
use App\Models\Room;
use Exception;

class RoomRepository implements RoomRepositoryInterface
{
    protected $room;

    public function __construct(Room $room) {
        $this->room = $room;
    }

    public function all() {
        return $this->room->select('id', 'name', 'description')->get();
    }

    public function find($id) {
        return $this->room->select('id', 'name', 'description')->find($id) ?? false;
    }

    public function create(array $data) {
        return $this->room->create($data);
    }

    public function update($id, array $data) {
        $room = $this->find($id);
        $room->update($data);
        return $room;
    }

    public function delete($id) {
        return $this->room->destroy($id);
    }
}