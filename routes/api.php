<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NumberController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\InfoController;
use App\Http\Controllers\Api\ResultController;
use App\Models\Number;
use App\Models\Student;
use App\Models\Info;
use App\Models\Result;

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

Route::resource('v1/number', NumberController::class);
Route::resource('v1/student', StudentController::class);
Route::resource('v1/info', InfoController::class);
Route::resource('v1/result', ResultController::class);
