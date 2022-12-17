<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;

class UserService implements UserServiceInterface
{
    /**
     * @param array $userData
     * @return User
     */
    public function createUser(array $userData): User
    {
        $customerRole = Role::where('slug', Role::ROLES['customer'])->first();
        $userData['password'] = bcrypt($userData['password']);
        $user = User::create($userData);
        $user->roles()->attach($customerRole);

        return $user;
    }
}
