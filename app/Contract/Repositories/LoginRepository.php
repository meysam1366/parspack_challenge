<?php

namespace App\Contract\Repositories;

use App\Contract\Interfaces\LoginInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRepository implements LoginInterface
{
    public function login($request)
    {
        $user = User::whereEmail($request['email'])->first();
        if($user && Hash::check($request['password'], $user->password)) {
            return $user;
        }
        return false;
    }
}
