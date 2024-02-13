<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn () => view('welcome'));

use App\Http\Controllers\LoanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportLoanController;
use App\Http\Controllers\ReportCustomerController;

Route::get('/', fn () => redirect('sign-in'))->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', fn () => view('sessions.password.verify'))->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', fn ($token) => view('sessions.password.reset', ['token' => $token]))
->middleware('guest')
->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
    Route::get('billing', fn () => view('pages.billing'))->name('billing');
    Route::get('tables', fn () => view('pages.tables'))->name('tables');
    Route::get('rtl', fn () => view('pages.rtl'))->name('rtl');
    Route::get('virtual-reality', fn () => view('pages.virtual-reality'))->name('virtual-reality');
    Route::get('notifications', fn () => view('pages.notifications'))->name('notifications');
    Route::get('static-sign-in', fn () => view('pages.static-sign-in'))->name('static-sign-in');
    Route::get('static-sign-up', fn () => view('pages.static-sign-up'))->name('static-sign-up');
    Route::get('user-management', fn () => view('pages.laravel-examples.user-management'))->name('user-management');
    Route::get('user-profile', fn () => view('pages.laravel-examples.user-profile'))->name('user-profile');

    // Customer Routes
    //Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::resource('customers', CustomerController::class);
    Route::resource('loans', LoanController::class);
    Route::get('/payments/{loan}/{cuota}',[ PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/reportloan', [ReportLoanController::class, 'generateReport'])->name('reportloan.index');
    Route::get('/reportloanone/{loan}', [ReportLoanController::class, 'generateOneReport'])
    ->name('reportoneloan.index');
    Route::get('/reportcustomer', [ReportCustomerController::class, 'generateReport'])->name('reportcustomer.index');
    Route::get('/reportcustomerone/{customer}', [ReportCustomerController::class, 'generateOneReport'])
    ->name('reportonecustomer.index');
});
