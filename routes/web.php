<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use Illuminate\Auth\Middleware\Authenticate;

use App\Http\Controllers\NumberController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ResultController;
use App\Models\Number;
use App\Models\Student;
use App\Models\Info;
use App\Models\Result;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/route_cache', [ConfigController::class, 'clearRoute']);

// Route::post('/send_sms', [PagesController::class, 'send_sms'])->name('send_sms');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
   Route::get('/', function () {
      return view('admin.layouts.home');
   });

   Route::resource('numbers', NumberController::class);
   Route::resource('students', StudentController::class);
   Route::resource('infos', InfoController::class);
   Route::resource('results', ResultController::class);

});