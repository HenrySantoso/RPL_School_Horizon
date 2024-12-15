<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InvoiceController;

//guest login
Route::middleware(['guest:student'])->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('loginStudent');
    Route::post('/', [AuthController::class, 'loginStudent']);
});

//login student app
Route::get('/', [LoginController::class, 'showLoginStudentForm'])->name('loginStudent');
Route::post('/', [LoginController::class, 'loginStudent']);
Route::post('/logoutStudent', [LoginController::class, 'logoutStudent'])->name('logoutStudent');

//login bank app
Route::get('/loginBank', [LoginController::class, 'showLoginBankForm'])->name('loginBank');
Route::post('/loginBank', [LoginController::class, 'loginBank']);
Route::post('/logoutBank', [LoginController::class, 'logoutBank'])->name('logoutBank');

//student app
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/profile', [StudentController::class, 'profile']);
    Route::get('/student/invoice', [StudentController::class, 'invoice']);
    Route::get('/student/transaction', [StudentController::class, 'transaction']);
    Route::put('/student/update', [StudentController::class, 'update'])->name('student.update');
    Route::get('/generate-invoice', [StudentController::class, 'generateInvoice'])->name('generate-invoice');
});

//banking app
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/bank/account', [BankController::class, 'account']);
    Route::get('/bank/payment', [BankController::class, 'payment']);
    Route::get('/bank/payment/virtual', [BankController::class, 'virtual']);
    Route::get('/bank/payment/virtualDetails', [BankController::class, 'virtualDetails']);
    Route::post('/bank/payment/process', [BankController::class, 'process'])->name('payment.process');
   // Route::post('/bank/payment/verify', [BankController::class, 'verifyPassword'])->name('payment.verify');
    Route::post('/payment/complete', [BankController::class, 'completePayment']);
    Route::get('/payment/succeed', [BankController::class, 'succeedPayment']);
    Route::post('/bank/payment/transaction', [BankController::class, 'processTransaction']);
});

//api
//Route::get('/', [ApiController::class, 'getAllStudents']);
//invoice

