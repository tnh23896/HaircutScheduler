<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceManagement\CategoryController;
use App\Http\Controllers\Admin\BannerManagement\BannerController;
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
*/

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

// Banner
Route::get('banner', [BannerController::class, 'index'])
    ->name('admin.banners.index');
Route::get('banner/create', [BannerController::class, 'create'])
    ->name('admin.banners.create');
Route::post('banner/create', [BannerController::class, 'store'])
    ->name('admin.banners.store');
Route::get('banner/edit/{id}', [BannerController::class, 'edit'])
    ->name('admin.banners.edit');
Route::post('banner/update/{id}', [BannerController::class, 'update'])
    ->name('admin.banners.update');
Route::delete('banner/delete/{id}', [BannerController::class, 'delete'])
    ->name('admin.banners.delete');
