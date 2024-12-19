<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
 

Route::group(['middleware' => ['json.response']], function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/register', 'Api\Auth\AuthController@register');
    Route::post('/login', 'Api\Auth\AuthController@login');
    Route::post('/send-otp', 'Api\Auth\ForgetPasswordController@sendOtp');
    //  Route::post('/resend-otp', 'Api\Auth\ForgetPasswordController@resendOtp');
    Route::post('/reset-password', 'Api\Auth\ForgetPasswordController@resetPassword');
    Route::post('/verify-otp', 'Api\Auth\VerificationController@verifyOtp');
    Route::post('/resend-otp', 'Api\Auth\VerificationController@resendOtp');

    // Route::post('/resend-otp-order', [FinanceController::class, 'resendOtp']);
    Route::get('/act_mod', 'Api\UserController@act_mod');
    
});
    
 
 