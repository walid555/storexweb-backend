<?php
namespace App\Services;

use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAllUsers();
    }

    public function save($data)
    {
        return $this->userRepository->storeUser($data);
    }

    public function update($user , $data)
    {
        return $this->userRepository->updateUser($user , $data);
    }

    public function delete($user)
    {
        return $this->userRepository->deleteUser($user);
    }
}
