<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\BlogController;
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
Route::get('/',[HomeController::class,'index'])->name('client.index');
Route::get('/blog',[BlogController::class,'list_blog'])->name('client.blog');
Route::get('/service',[ServiceController::class,'list_service'])->name('client.service');