<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TimeController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('time')->group(function () {
    Route::get('total-days/{date1?}/{date2?}', [TimeController::class, 'getTotalDays']);
    Route::get('total-weekdays/{date1?}/{date2?}', [TimeController::class, 'getTotalWeekdays']);
});