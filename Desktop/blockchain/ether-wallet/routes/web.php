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

use App\Http\Controllers\WalletController;

Route::get('/', [WalletController::class, 'index']);
Route::post('/create-wallet', [WalletController::class, 'createWallet']);
Route::post('/check-balance', [WalletController::class, 'checkBalance']);
Route::post('/send-transaction', [WalletController::class, 'sendTransaction']);
