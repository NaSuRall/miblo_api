<?php

namespace App\Actions\Service;

use App\Models\Service;
use App\DTOs\ServiceDTO;

class StoreServiceAction
{
    public function execute(ServiceDTO $dto): Service
    {
        $service = Service::create([
            "user_id" => $dto->user_id,
            "name" => $dto->name,
        ]);

        return $service;
    }
}
