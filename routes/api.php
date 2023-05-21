<?php

use App\Http\Controllers\api\FeedbackController;
use App\Http\Controllers\api\MessageController;
use App\Http\Controllers\Api\SponsorController;
use App\Http\Controllers\Api\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/profiles', [UserController::class, 'index']);
Route::get('profiles/{slug}', [UserController::class, 'show']);
Route::post('messages', [MessageController::class, 'index']);
Route::post('messages', [MessageController::class, 'store']);
Route::post('feedback', [FeedbackController::class, 'store']);