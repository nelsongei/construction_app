<?php

use App\Http\Controllers\Site\OrdersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('bookings/all',[OrdersController::class,'allOrders']);
Route::get('vendor/items/{name}',[OrdersController::class,'vendorData']);
Route::get('bookings/orderstatus/ordered',[OrdersController::class,'orderStatus']);
