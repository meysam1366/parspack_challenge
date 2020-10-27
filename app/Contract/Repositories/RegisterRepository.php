<?php

namespace App\Contract\Repositories;

use App\Contract\Interfaces\RegisterInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterRepository implements RegisterInterface
{
    public function signup($request)
    {
        $request['name'] = strpos($request['name'],'rm') == 4 ? str_replace('rm','',$request['name']) : '';
        $request["password"] = Hash::make($request['password']);
        $user = User::query()->create($request);
        $token = $user->createToken($request['name'])->plainTextToken;
        return [
            'user' => $user,
            'token' => $token
        ];
    }
}
