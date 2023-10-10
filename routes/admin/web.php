<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceManagement\CategoryController;
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
/*
 * đây là route để hiển thị view admin
// */

Route::group(['middleware' => 'auth.admin'], function () {
	Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});
//Category Service
Route::get('category-service', [CategoryController::class, 'index'])
	->name('admin.serviceManagement.category.index');
Route::get('category-service/create', [CategoryController::class, 'create'])
	->name('admin.serviceManagement.category.create');
Route::post('category-service/create', [CategoryController::class, 'store'])
	->name('admin.serviceManagement.category.store');
Route::get('category-service/edit/{id}', [CategoryController::class, 'edit'])
	->name('admin.serviceManagement.category.edit');
Route::post('category-service/edit/{id}', [CategoryController::class, 'update'])
	->name('admin.serviceManagement.category.update');

//__BlogManagement__
//BlogCategoy
Route::get('blog-category', [App\Http\Controllers\Admin\BlogManagement\CategoryController::class, 'index'])
	->name('admin.blogManagement.category.index');

Route::get('blog-category/create', [App\Http\Controllers\Admin\BlogManagement\CategoryController::class, 'create'])
	->name('admin.blogManagement.category.create');

Route::post('blog-category/create', [App\Http\Controllers\Admin\BlogManagement\CategoryController::class, 'store'])
	->name('admin.blogManagement.category.store');

Route::get('blog-category/edit/{id}', [App\Http\Controllers\Admin\BlogManagement\CategoryController::class, 'edit'])
	->name('admin.blogManagement.category.edit');
	
Route::post('blog-category/edit/{id}', [App\Http\Controllers\Admin\BlogManagement\CategoryController::class, 'update'])
	->name('admin.blogManagement.category.update');
