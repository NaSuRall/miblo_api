<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
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

    public function store(Request $request, StoreUserAction $action)
    {
        try {
            $dto = UserDTO::fromRequest($request);
            $user = $action->execute($dto);
            return response()->json([
                "user" => $user,
                "message" => "User created successfully",
            ]);
        } catch (Exception $e) {
            return response()->json(
                [
                    "message" => $e->getMessage(),
                ],
                400,
            );
        }
    }

    public function logout()
    {

    }
}
