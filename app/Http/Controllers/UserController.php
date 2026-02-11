<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Actions\user\StoreUserAction;
use App\DTOs\UserDTO;
use App\Actions\user\LoginAction;

class UserController extends Controller
{
    public function login(LoginRequest $request, LoginAction $action)
    {
        $result = $action->execute($request);

        return response()->json([
            "user" => $result["user"],
            "token" => $result["token"],
        ]);
    }

    public function store(StoreUserRequest $request, StoreUserAction $action)
    {
        $dto = UserDTO::fromRequest($request);
        $user = $action->execute($dto);
        return response()->json([
            "user" => $user,
            "message" => "User created successfully",
        ]);
    }

    public function logout() {}
}
