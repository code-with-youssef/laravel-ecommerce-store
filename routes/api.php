<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/payment/webhook', [PaymentController::class, 'paymentWebhook']); // Post request form Paymob containing all the order info.

Route::get('payment/webhook/thankyou',[PaymentController::class, 'paymentDone']); //Route from Paymob to thankyou page.