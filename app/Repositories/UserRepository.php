<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAllUsers()
    {
        return User::select(['id','name' , 'email' , 'birth_date' , 'created_at'])->order()->paginate(10);
    }

    public function storeUser($data)
    {
        return User::create($data);
    }

    public function updateUser($user ,$data)
    {
        return $user->update($data);
    }

    public function deleteUser($user)
    {
        return $user->delete();
    }
}
