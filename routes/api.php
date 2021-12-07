<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimestampsController;
use App\Http\Controllers\DevicesConnectedController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Timestamps
// - Crear una timestamp
Route::post('/timestamps', [TimestampsController::class, 'store']);

// - Editar una timestamp
Route::patch('/timestamps', [TimestampsController::class, 'update']);

// - Conseguir una timestamp
Route::get('/timestamps', [TimestampsController::class, 'show']);

// - Eliminar una timestamp
Route::delete('/timestamps', [TimestampsController::class, 'delete']);

// Devices_connected
// - Crear una entrada
Route::post('/devices-connected', [DevicesConnectedController::class, 'store']);

// - Saber si ya existe una entrada
Route::get('/devices-connected', [DevicesConnectedController::class, 'show']);

// - Eliminar una entrada
Route::delete('/devices-connected', [DevicesConnectedController::class, 'delete']);


