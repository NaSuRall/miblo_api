<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Service\StoreServiceAction;
use App\DTOs\ServiceDTO;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use App\Actions\Service\UpdateServiceAction;
use App\Http\Requests\UpdateServiceRequest;
use App\Actions\Service\DeleteServiceAction;
class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $services = Service::where("user_id", $user->id)->get();

        return response()->json([
            "services" => $services,
        ]);
    }
    public function store(
        StoreServiceRequest $request,
        StoreServiceAction $action,
    ) {
        try {
            $user = $request->user();
            $dto = ServiceDTO::fromRequest($request);
            $service = $action->execute($dto);
            return response()->json([
                "message" => "Service created successfully",
                "service" => $service->toArray(),
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "message" => "Error creating service",
                    "error" => $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function update(
        Service $service,
        UpdateServiceRequest $request,
        UpdateServiceAction $action,
    ) {
        $user = $request->user();

        if ($service->user_id !== $user->id) {
            return response()->json(["error" => "Unauthorized"], 403);
        }

        try {
            $dto = ServiceDTO::fromRequest($request);
            $services = $action->execute($service, $dto);
            return response()->json([
                "message" => "Service updated successfully",
                "service" => $services->toArray(),
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "message" => "Error updating service",
                    "error" => $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function destroy(
        Service $service,
        DeleteServiceAction $action,
    ) {
        $user = request()->user();

        if ($service->user_id !== $user->id) {
            return response()->json(["error" => "Unauthorized"], 403);
        }

        try {
            $action->execute($service);
            return response()->json([
                "message" => "Service deleted successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "message" => "Error deleting service",
                    "error" => $e->getMessage(),
                ],
                500,
            );
        }
    }

}
