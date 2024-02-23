<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/contacts', [ContactController::class, 'index']);
// Route::post('/contacts', [ContactController::class, 'store']);
// Route::get('/contacts/details/{contact}', [ContactController::class, 'show']);
// Route::post('/contacts/update/{contact}', [ContactController::class, 'update']);
// Route::delete('/contacts/delete/{contact}', [ContactController::class, 'destroy']);
Route::apiResource('contacts', ContactController::class);