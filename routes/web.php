<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InvoiceController;

//guest login
Route::middleware(['guest:student'])->group(function () {
    Route::get('/loginStudent', [AuthController::class, 'showLogin'])->name('loginStudent');
    Route::post('/loginStudent', [AuthController::class, 'loginStudent']);
});

//login student app
Route::get('/loginStudent', [LoginController::class, 'showLoginStudentForm'])->name('loginStudent');
Route::post('/loginStudent', [LoginController::class, 'loginStudent']);
Route::post('/logoutStudent', [LoginController::class, 'logoutStudent'])->name('logoutStudent');

//student app
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/profile', [ApiController::class, 'profile']);
    Route::get('/student/invoice', [StudentController::class, 'invoice']);
    Route::get('/student/transaction', [StudentController::class, 'transaction']);
});

//login bank app
Route::get('/loginBank', [LoginController::class, 'showLoginFormBank'])->name('loginBank');
Route::post('/loginBank', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//banking app
Route::get('/bank/account', [BankController::class, 'account']);
Route::get('/bank/payment', [BankController::class, 'payment']);
Route::post('/bank/payment/process', [BankController::class, 'process'])->name('payment.process');

//api
Route::get('/', [ApiController::class, 'getAllStudents']);
Route::get('/test', [ApiController::class, 'getAllStudents']);

//invoice
Route::get('/generate-invoice', [InvoiceController::class, 'generateInvoice'])->name('generate-invoice');;
