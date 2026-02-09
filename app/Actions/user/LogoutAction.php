<?php

namespace App\Actions\user;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\AuthenticationException;
use App\Models\User;

class LogoutAction
{
    public function execute(Request $request)
    {
        $request->user()->tokens()->delete();
    }
}
