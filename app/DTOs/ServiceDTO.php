<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class ServiceDTO
{
    public function __construct(public ?int $user_id, public string $name) {}

    public static function fromRequest(Request $request): ServiceDTO
    {
        return new ServiceDTO(
            $request->input("user_id"),
            $request->input("name"),
        );
    }
}
