<?php

namespace App\Contract\Repositories;

use App\Contract\Interfaces\RegisterInterface;
use App\Models\User;

class RegisterRepository implements RegisterInterface
{
    public function signup($request)
    {
        $user = User::query()->create($request);
        $token = $user->createToken($request['name'])->plainTextToken;
        return [
            'user' => $user,
            'token' => $token
        ];
    }
}
