<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Site\PageController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//   // return view('welcome');
//});
Route::get('/',[PageController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Categories
Route::group(['prefix'=>'categories'],function (){
    Route::get('/',[CategoryController::class,'index']);
    Route::post('/store',[CategoryController::class,'store']);
    Route::post('/update',[CategoryController::class,'update']);
    Route::get('/delete/{id}',[CategoryController::class,'delete']);
});
//Products
Route::group(['prefix'=>'products'],function (){
    Route::get('/',[ProductController::class,'index']);
    Route::post('/store',[ProductController::class,'store']);
});
