<?php

namespace App\Actions\Service;

use App\Models\Service;
use App\DTOs\ServiceDTO;

class UpdateServiceAction
{
    public function execute(Service $service, ServiceDTO $dto): Service
    {
        $service->name = $dto->name;
        $service->save();
        return $service;
    }
}
