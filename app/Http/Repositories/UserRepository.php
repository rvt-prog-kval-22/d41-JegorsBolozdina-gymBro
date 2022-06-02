<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($userId)
    {
        return User::findOrFail($userId);
    }

    public function getUsersNameById($userId)
    {
        return User::whereId($userId)->value('name');
    }

    public function deleteUser($userId)
    {
        return User::destroy($userId);
    }

    public function createUser(array $userDetails)
    {
        return User::create($userDetails);
    }

    public function updateUser($userId, array $newDetails)
    {
        return User::whereId($userId)->update($newDetails);
    }

    public function getNonPrivelegedUsers()
    {
        return User::where('role', 'user');
    }

    public function isAdmin($userId)
    {
        return User::whereId($userId)->value('role') === 'admin';
    }

    public function givePriveleges($userId)
    {
        return $this->isAdmin($userId) ? User::whereId($userId)->update(['role' => 'user']) : User::whereId($userId)->update(['role' => 'admin']);
    }
}
