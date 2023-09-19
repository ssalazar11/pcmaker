<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
