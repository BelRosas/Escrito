<?php

use App\Http\Controllers\TareaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post("tarea",[TareaController::class, "CrearTarea"]);
    Route::get("tarea",[TareaController::class, "ListarTarea"]);
    Route::get("tarea/{d}",[TareaController::class, "ListarUnaTarea"]);
    Route::put("tarea/{d}",[TareaController::class, "ActualizarTarea"]);
    Route::delete("tarea/{d}",[TareaController::class, "EliminarTarea"]);
});
