<?php

use App\Http\Controllers\MatchResultController;
use App\Http\Controllers\MatchScoreController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TeamController;
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

Route::resource('match-results', MatchResultController::class);
Route::resource('teams', TeamController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('match-scores', MatchScoreController::class);
