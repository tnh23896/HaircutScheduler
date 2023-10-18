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
Route::get('/', function () {
	return view('client.index');
});

//Blog
Route::get('/blog', [BlogController::class, 'list_blog'])->name('blog');
//Detail Blog
Route::get('/blog/{id}', [BlogController::class, 'detail_blog'])->name('detail.blog');
//View Blog With Category
Route::get('/blog/category/{id}', [BlogController::class, 'list_blog_category'])->name('list.blog.category');
