<?php

namespace App\Actions\Road;

use App\Models\Road;
use App\DTOs\RoadDTO;
use App\Models\Service;

class StoreRoadAction
{
    public function execute(RoadDTO $dto, Service $service): Road
    {
       $road = Road::create([
            "service_id" => $service->id,
            "path" => $dto->path,
            "method" => $dto->method,
            "data" => $dto->data,
       ]);

       return $road;
    }
}
