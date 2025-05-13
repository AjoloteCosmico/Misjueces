<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Pública
Route::get("/", function () {
    return view("home_no_log");
});

// Autenticación
require __DIR__ . "/auth.php";

// Rutas protegidas
Route::middleware(["auth"])->group(function () {
    // Dashboard
    Route::get("/dashboard", function () {
        return view("layouts.home");
    })->name("dashboard");

    // Perfil
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );

    // Solo admin
    Route::middleware(["role:admin"])->group(function () {
        Route::get("/admin", function () {
            return view("admin.dashboard");
        })->name("admin.dashboard");
    });
});

// ===== [INICIO] Sprint 2 - Sistema de Votación ===== //
Route::middleware(["auth"])->group(function () {
    // Rutas para gestionar candidatos (solo necesitamos index, create y show)
    Route::resource(
        "candidatos",
        App\Http\Controllers\CandidatoController::class
    )->only(["index", "create", "show"]);

    // Ruta para procesar el formulario de votación
    Route::post("votar", [
        App\Http\Controllers\VotacionController::class,
        "store",
    ])->name("votar.store");
});

// Ruta para el autocompletado (pública, no requiere login)
Route::get("/api/candidatos/buscar", [
    App\Http\Controllers\CandidatoController::class,
    "buscar",
]);
// ===== [FIN] Sprint 2 ===== //

// ===== [INICIO] Sprint 3 - PDF's legales ===== //
Route::resource("legals", App\Http\Controllers\LegalController::class);
// ===== [FIN] Sprint 3 ===== //
