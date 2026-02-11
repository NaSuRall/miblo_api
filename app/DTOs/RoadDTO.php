<?php

namespace App\DTOs;

use Illuminate\Http\Request;

class RoadDTO
{
    public function __construct(
        public string $path,
        public string $method,
        public array $data
    ) {}

    public static function fromRequest(Request $request): self
    {
        return new RoadDTO(
            $request->input("path"),
            $request->input("method"),
            $request->input("data"),
        );
    }
}
