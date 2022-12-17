<?php

namespace App\Services;

use App\Models\User;

interface UserServiceInterface
{
    /**
     * @param array $userData
     * @return User
     */
    public function createUser(array $userData): User;
}
