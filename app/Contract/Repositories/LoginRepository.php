<?php

namespace App\Contract\Repositories;

use App\Contract\Interfaces\LoginInterface;

class LoginRepository implements LoginInterface
{
    public function login($request)
    {
        return $request->user();
    }
}
