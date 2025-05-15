<?php

use App\Http\Controllers\Api\ProfileApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SigninApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/signin', [SigninApiController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', [ProfileApiController::class, 'getdataprofile']); 
    Route::get('/signout', [SigninApiController::class, 'signout']);
});
