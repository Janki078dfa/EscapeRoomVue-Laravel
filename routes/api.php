<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

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


/* Vue Resources */

Route::resource('booking', BookingController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
Route::resource('game', GameController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
Route::resource('review', ReviewController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
Route::resource('room', RoomController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
Route::resource('user', UserController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
