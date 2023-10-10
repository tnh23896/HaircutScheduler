<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceManagement\CategoryController;
use App\Http\Controllers\Admin\ServiceManagement\ServiceController;
use App\Models\Service;

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
Route::delete('category-service/delete/{id}', [CategoryController::class, 'destroy'])
    ->name('admin.serviceManagement.category.delete');

//Service
Route::get('service', [ServiceController::class, 'index'])
->name('admin.serviceManagement.service.index');
Route::get('service/create', [ServiceController::class, 'create'])
->name('admin.serviceManagement.service.create');
Route::post('service/create', [ServiceController::class, 'store'])
->name('admin.serviceManagement.service.store');
Route::get('service/edit/{id}', [ServiceController::class, 'edit'])
->name('admin.serviceManagement.service.edit');
Route::post('service/edit/{id}', [ServiceController::class, 'update'])
->name('admin.serviceManagement.service.update');
Route::delete('service/delete/{id}', [ServiceController::class, 'destroy'])
->name('admin.serviceManagement.service.delete');




