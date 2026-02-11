<?php

namespace App\Http\Controllers;

use App\Models\Road;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Road as RoadModel;
use App\DTOs\RoadDTO;
use App\Http\Requests\StoreRoadRequest;
use App\Actions\Road\StoreRoadAction;

class RoadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Service $service)
    {
        $roads = $service->roads()->get();
        return response()->json($roads);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoadRequest $request, StoreRoadAction $action, Service $service)
    {
        $dto = RoadDTO::fromRequest($request);
        $road = $action->execute($dto, $service);
        return response()->json($road);
    }

    /**
     * Display the specified resource.
     */
    public function show(RoadModel $road)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoadModel $road)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Road $road)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoadModel $road)
    {
        //
    }
}
