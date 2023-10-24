<?php

use App\Http\Controllers\Client\BookingDetailsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\BillController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\ServiceController;
use App\Http\Controllers\Client\AboutUsController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Admin\DashboardController;


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



// Login otp
Route::post('/login-with-otp', [AuthController::class, 'login'])->name('loginOtp');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Home

Route::get('/', [HomeController::class, 'index'])->name('home.index');
//booking history
Route::get('booking-history', [BookingController::class, 'booking_history'])->name('booking_history');
Route::get('/booking-history/edit/{id}', [BookingController::class, 'edit'])->name('booking-history.edit');

//Booking Details
Route::put('/booking-details/update/{id}', [BookingDetailsController::class, 'update'])->name('booking-details.update');
Route::post('/booking-details/store/{id}', [BookingDetailsController::class, 'store'])->name('booking-details.store');


//Bill Payment
Route::get('bill-history', [BillController::class, 'index'])->name('bill');

//Blog
Route::get('/blog', [BlogController::class, 'list_blog'])->name('blog');
//Detail Blog
Route::get('/blog/{id}', [BlogController::class, 'detail_blog'])->name('detail.blog');
//View Blog With Category
Route::get('/blog/category/{id}', [BlogController::class, 'list_blog_category'])->name('list.blog.category');
// Profile

Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
//About-us
Route::get('/about-us', [AboutUsController::class, 'list_employee'])->name('client.aboutus');
