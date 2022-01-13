<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\paymentController;

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


Route::post('payment',          [paymentController::class, 'postPayment']);
Route::get('payment/{id}',      [paymentController::class, 'getPaymentHtml'])->middleware('checkPaymentExist');
Route::get('json/payment/{id}', [paymentController::class, 'getPayment'])->middleware('checkPaymentExist');
