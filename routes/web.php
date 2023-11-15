<?php

use App\Http\Controllers\Client\BookingDetailsController;
use App\Http\Controllers\Client\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\BillController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\AboutUsController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Admin\DashboardController;
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
Route::get('/test', function () {
	return view('client.test');
});

// Login otp
Route::post('/login-with-otp', [AuthController::class, 'login'])->name('loginOtp');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Home

Route::get('/', [HomeController::class, 'index'])->name('home.index');
//booking history
Route::get('booking-history', [BookingController::class, 'booking_history'])->name('booking_history');
Route::get('/booking-history/edit/{id}', [BookingController::class, 'edit'])->name('booking-history.edit');
Route::post('/booking-history/destroy/{id}', [BookingController::class, 'destroy'])->name('booking-history.delete');
//Booking Details
Route::put('/booking-details/update/{id}', [BookingDetailsController::class, 'update'])->name('booking-details.update');
Route::post('/booking-details/store/{id}', [BookingDetailsController::class, 'store'])->name('booking-details.store');
//Bill Payment
Route::get('bill', [BillController::class, 'index'])->name('bill');
Route::get('bill_print/{id}', [BillController::class, 'printBill'])->name('print.bill');

//Blog
Route::get('/blog', [BlogController::class, 'list_blog'])->name('blog');
//Detail Blog
Route::get('/blog/{id}', [BlogController::class, 'detail_blog'])->name('detail.blog');
//View Blog With Category
Route::get('/blog/category/{id}', [BlogController::class, 'list_blog_category'])->name('list.blog.category');
//Service
Route::get('/service', [ServiceController::class, 'list_service'])->name('client.service');

Route::get('/booking-service', [BookingController::class, 'index'])->name('booking-service.index');
Route::post('/booking-service/getStaff', [BookingController::class, 'getStaff'])->name('booking-service.getStaff');
Route::post('/booking-service/store', [BookingController::class, 'store'])->name('booking-service.store');
// Profile

Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
//About-us
Route::get('/about-us', [AboutUsController::class, 'list_employee'])->name('client.aboutus');

//Reviews
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');

