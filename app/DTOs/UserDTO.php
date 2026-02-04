<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class UserDTO
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $email,
        public string $password,
        public string $phone,
    ) {}

    public static function fromRequest(Request $request): UserDTO
    {
        return new UserDTO(
            $request->input("first_name"),
            $request->input("last_name"),
            $request->input("email"),
            $request->input("password"),
            $request->input("phone"),
        );
    }
}
