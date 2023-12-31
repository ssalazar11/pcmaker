<?php

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
    Route::get('/admin/products/edit/{id}', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
    Route::put('/admin/product/{id}', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
    Route::delete('/admin/products/delete/{id}', 'App\Http\Controllers\Admin\AdminProductController@destroy')->name('admin.product.delete');
});

Route::post('/comments/store', 'App\Http\Controllers\CommentController@store')->name('comment.store');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name('myaccount.orders');
    Route::get('/my-account/orders/{order}', 'App\Http\Controllers\MyAccountController@showOrderDetails')->name('orders.show');
    Route::get('/my-account/orders/{order}/download-invoice', 'App\Http\Controllers\MyAccountController@downloadInvoice')->name('orders.downloadInvoice');

    Route::get('/interviews', 'App\Http\Controllers\InterviewController@index')->name('interview.index');
    Route::get('/interviews/create', 'App\Http\Controllers\InterviewController@create')->name('interview.create');
    Route::post('/interviews', 'App\Http\Controllers\InterviewController@store')->name('interview.store');
    Route::get('/interviews/{id}/edit', 'App\Http\Controllers\InterviewController@edit')->name('interview.edit');
    Route::match(['put', 'patch'], '/interviews/{id}', 'App\Http\Controllers\InterviewController@update')->name('interview.update');
    Route::delete('/interviews/{id}', 'App\Http\Controllers\InterviewController@delete')->name('interview.delete');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
