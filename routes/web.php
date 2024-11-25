<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\StudentController;
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

//login bank app
Route::get('/loginBank', [LoginController::class, 'showLoginFormBank'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//login student app
Route::get('/loginStudent', [LoginController::class, 'showLoginFormStudent'])->name('login');

// Redirect users after login
Route::get('/dashboard', function () {
    return "Welcome to your banking dashboard!";
})->middleware('auth');

//banking app
Route::get('/bank/home', [BankController::class, 'home']);
Route::get('/bank/payment', [BankController::class, 'payment']);
Route::post('/bank/payment/process', [BankController::class, 'process'])->name('payment.process');

//student app
Route::get('/student/dashboard', [StudentController::class, 'dashboard']);
Route::get('/student/invoice', [StudentController::class, 'invoice']);

//api
Route::get('/', [ApiController::class, 'getApiData']);
Route::get('/test', [ApiController::class, 'getCategory']);
