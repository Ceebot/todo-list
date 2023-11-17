<?php

namespace App\Services\Users;

use App\Models\User;

class UserService
{
    public function getAdmin(): User
    {
        return User::where('is_admin', 1)->first();
    }
}
