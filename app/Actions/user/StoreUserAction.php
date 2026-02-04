<?php

namespace App\Actions\user;

use App\DTOs\UserDTO;
use App\Models\User;

class StoreUserAction
{
    public function execute(UserDTO $dto): User
    {
        $user = User::create([
            "first_name" => $dto->first_name,
            "last_name" => $dto->last_name,
            "email" => $dto->email,
            "password" => $dto->password,
            "phone" => $dto->phone,
        ]);

        return $user;
    }
}
