<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Subscriptions\PaymentController;
use App\Http\Controllers\Subscriptions\SubscriptionController;

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

Route::get('/', function () {
    return view('welcome');
});




Route::middleware(['auth:sanctum', 'verified', 'subscribed'])->group(function () {

    Route::get('/abonne', function () {
        return view('subscriptions.abonne');
    })->name('abonne');
});

/////subscribed

Route::middleware(['auth:sanctum', 'verified', 'nosubscribed'])->group(function () {



    Route::get('plans',  [SubscriptionController::class, 'index'])->name('plans');
    Route::get('/payments',  [PaymentController::class, 'index'])->name('payments');

    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
