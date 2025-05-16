<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\SigninApiController;
use App\Http\Controllers\Api\ProfileApiController;

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
    // Menu route
    Route::prefix('menu')->group(function () {
        Route::get('/', [MenuApiController::class, 'getdatamenu']);
        Route::post('/store', [MenuApiController::class, 'store']);
        Route::get('/edit/{id}', [MenuApiController::class, 'edit']);
        Route::post('/update/{id}', [MenuApiController::class, 'update']);
        Route::get('/delete/{id}', [MenuApiController::class, 'destroy']);
    });





    // profile route
    Route::get('/profile', [ProfileApiController::class, 'getdataprofile']); 
    Route::get('/signout', [SigninApiController::class, 'signout']);
});
