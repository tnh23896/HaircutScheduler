<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceManagement\CategoryController;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => 'admin'], function () {
    
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
});
// Login Admin
Route::get('login', [LoginController::class, 'showAdminLoginForm'])
        ->name('login');
Route::post('login', [LoginController::class, 'adminLogin'])
        ->name('auth.login');
Route::get('logout', [LoginController::class, 'logout'])
        ->name('auth.logout');
//Category Service
Route::get('category-service', [CategoryController::class, 'index'])
    ->name('serviceManagement.category.index');
Route::get('category-service/create', [CategoryController::class, 'create'])
    ->name('admin.serviceManagement.category.create');
Route::post('category-service/create', [CategoryController::class, 'store'])
    ->name('admin.serviceManagement.category.store');
Route::get('category-service/edit/{id}', [CategoryController::class, 'edit'])
    ->name('admin.serviceManagement.category.edit');
Route::post('category-service/edit/{id}', [CategoryController::class, 'update'])
    ->name('admin.serviceManagement.category.update');
