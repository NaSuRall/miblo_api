<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RoadController;

// --- Routes publiques ---
Route::post("/register", [UserController::class, "store"])->name("register");
Route::post("/login", [UserController::class, "login"])->name("login");
// Route::post("/logout", [UserController::class, "logout"])->name("logout");

// --- Routes protégées par Sanctum ---
Route::middleware("auth:sanctum")->group(function () {
    // Récupérer l'utilisateur connecté
    Route::get("/user", function (Request $request) {
        return $request->user();
    });
    // Services
    Route::get("/services", [ServiceController::class, "index"])->name(
        "service.index",
    );

    Route::post("/services", [ServiceController::class, "store"])->name(
        "service.store",
    );

    Route::put("/services/{service}", [
        ServiceController::class,
        "update",
    ])->name("service.update");

    Route::delete("/services/{service}", [
        ServiceController::class,
        "destroy",
    ])->name("service.destroy");

    // Roads
    Route::get("/services/{service}/roads", [RoadController::class, "index"]);
    Route::post("/services/{service}/roads", [RoadController::class, "store"]);
    Route::put("/services/{service}/roads/{road}", [
        RoadController::class,
        "update",
    ]);
    Route::delete("/services/{service}/roads/{road}", [
        RoadController::class,
        "destroy",
    ]);
});
