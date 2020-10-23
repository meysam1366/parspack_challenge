<?php

namespace App\Http\Controllers\API;

use App\Contract\Interfaces\CreateInterface;
use App\Contract\Interfaces\LoginInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\APIRequest;
use Illuminate\Http\Request;
use App\Contract\Interfaces\RegisterInterface;
use App\Http\Requests\LoginRequest;
use Symfony\Component\HttpFoundation\Response;

class APIController extends Controller
{
    protected $register;
    protected $login;
    protected $create;

    public function __construct(
        RegisterInterface $register,
        LoginInterface $login,
        CreateInterface $create
    )
    {
        $this->register = $register;
        $this->login = $login;
        $this->create = $create;
    }

    public function signUp(APIRequest $request)
    {
        $validated = $request->validated();
        $user = $this->register->signup($validated);
        return response()->json($user, Response::HTTP_CREATED);
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $response = $this->login->login($validated);
        if(!$response) {
            return response()->json([
                'message' => 'Email or Password Not Correct'
            ], Response::HTTP_UNAUTHORIZED);
        }
        return response()->json($response, Response::HTTP_OK);
    }

    public function getListPs()
    {
        $lists = explode(PHP_EOL,shell_exec('ps -A'));
        return response()->json($lists, Response::HTTP_OK);
    }

    public function createDirectoryByNameUser(Request $request)
    {
        $response = $this->create->createDirectory($request);
        return response()->json($response, Response::HTTP_CREATED);
    }

    public function createFileByNameUser(Request $request)
    {
        $response = $this->create->createFile($request);
        return response()->json($response, Response::HTTP_CREATED);
    }

    public function getAllDirectories()
    {
        $path = '/opt/myprogram';
        $response = $this->create->getAllDirectories($path);
        return response()->json($response, Response::HTTP_CREATED);
    }

    public function getAllFiles()
    {
        $path = '/opt/myprogram';
        $response = $this->create->getAllFiles($path);
        return response()->json($response, Response::HTTP_CREATED);
    }
}
