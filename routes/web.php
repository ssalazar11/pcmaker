<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InterviewController;

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



Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::middleware('admin')->group(function(){
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store"); 
});

Auth::routes();
Route::get('/specification', 'App\Http\Controllers\SpecificationController@index')->name("specification.index");
Route::get('/specification/create', 'App\Http\Controllers\SpecificationController@create')->name("specification.create");
Route::post('/specification/save', 'App\Http\Controllers\SpecificationController@save')->name("specification.save");
Route::get('/specification/{id}', 'App\Http\Controllers\SpecificationController@show')->name("specification.show");
Route::get('/deskComputer', 'App\Http\Controllers\deskComputerController@index')->name("deskComputer.index");
Route::get('/deskComputer/create', 'App\Http\Controllers\deskComputerController@create')->name("deskComputer.create");
Route::post('/deskComputer/save', 'App\Http\Controllers\deskComputerController@save')->name("deskComputer.save");
Route::get('/deskComputer/{id}', 'App\Http\Controllers\deskComputerController@show')->name("deskComputer.show");
Route::middleware(['auth'])->group(function () {
    Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('orders.create');
    Route::post('/orders', 'App\Http\Controllers\OrderController@store')->name('orders.store');
    Route::get('/orders/{order}', 'App\Http\Controllers\OrderController@show')->name('orders.show');
    Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders.index');

    Route::get('/interviews', [InterviewController::class, 'index'])->name('interviews.index');
    Route::get('/interviews/create', [InterviewController::class, 'create'])->name('interviews.create');
    Route::post('/interviews', [InterviewController::class, 'store'])->name('interviews.store');
    Route::get('/interviews/{interview}', [InterviewController::class, 'show'])->name('interviews.show');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
