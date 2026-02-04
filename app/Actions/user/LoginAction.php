<?php

namespace App\Actions\user;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\AuthenticationException;
use App\Models\User;

class LoginAction
{
    public function execute($credentials)
    {
        $user = User::where("email", $credentials->email)->first();

        if (!$user || !Hash::check($credentials->password, $user->password)) {
            throw new AuthenticationException();
        }

        $token = $user->createToken("api_token")->plainTextToken;

        return [
            "user" => $user,
            "token" => $token,
        ];
    }
}
