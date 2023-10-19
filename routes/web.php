<?php

use App\Http\Controllers\Client\BillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ServiceController;

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

// Route::group(['prefix' => 'admin','middleware' => 'auth.admin'], function () {
// 	Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
// });
Route::get('/test', function () {
	return view('client.test');
});

Route::get('/', function () {
	return view('client.index');
});

//booking history
Route::get('booking-history/{id}', [BookingController::class, 'booking_history'])->name('booking_history');
Route::get('/booking-history/edit/{id}', [BookingController::class, 'edit'])->name('booking-history.edit');
Route::put('/booking-history/update/{id}', [BookingController::class, 'update'])->name('booking-history.update');

//Bill Payment
Route::get('bill-history/{id}', [BillController::class, 'index'])->name('bill');

//Blog
Route::get('/blog', [BlogController::class, 'list_blog'])->name('blog');
//Detail Blog
Route::get('/blog/{id}', [BlogController::class, 'detail_blog'])->name('detail.blog');
//View Blog With Category
Route::get('/blog/category/{id}', [BlogController::class, 'list_blog_category'])->name('list.blog.category');
//Service
Route::get('/service', [ServiceController::class, 'list_service'])->name('client.service');