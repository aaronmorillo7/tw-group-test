<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function all() {
        return $this->user->all();
    }

    public function find($id) {
        return $this->user->find($id);
    }

    public function create(array $data) {
        return $this->user->create($data)->assignRole('client');
    }

    public function update($id, array $data) {
        $user = $this->find($id);
        $user->update($data);
        return $user;
    }

    public function delete($id) {
        return $this->user->destroy($id);
    }
}