<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface BookingRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}