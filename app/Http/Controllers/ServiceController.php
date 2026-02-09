<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Service\StoreServiceAction;
use App\DTOs\ServiceDTO;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $services = Service::where('user_id', $user->id)->get();

        return response()->json([
            "services" => $services
        ]);
    }
    public function store(StoreServiceRequest $request, StoreServiceAction $action)
    {
        try{
            $user = $request->user();
            $dto = ServiceDTO::fromRequest($request);
            $service = $action->execute($dto);
            return response()->json([
                "message" => "Service created successfully",
                "service" => $service->toArray()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Error creating service",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
