<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceManagement\CategoryController;
use App\Http\Controllers\Admin\TimeManagement\TimeController;
use App\Http\Controllers\Admin\UserManagement\UserController;
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
// TIME
Route::get('time', [TimeController::class, 'index'])
    ->name('TimeManagement.time.index');
Route::get('time/create', [TimeController::class, 'create'])
    ->name('TimeManagement.time.create');
Route::post('time/store', [TimeController::class, 'store'])
    ->name('TimeManagement.time.store');
Route::get('time/edit/{id}', [TimeController::class, 'edit'])
    ->name('TimeManagement.time.edit');
Route::post('time/update/{id}', [TimeController::class, 'update'])
    ->name('TimeManagement.time.update');
Route::delete('time/delete/{id}', [TimeController::class, 'destroy'])
    ->name('TimeManagement.time.delete');
//User
Route::get('user', [UserController::class, 'index'])
    ->name('UserManagement.user.index');
Route::get('user/edit/{id}', [UserController::class, 'edit'])
    ->name('UserManagement.user.edit');
Route::post('user/update/{id}', [UserController::class, 'update'])
    ->name('UserManagement.user.update');




