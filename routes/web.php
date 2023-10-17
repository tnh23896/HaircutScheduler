<?php

use Illuminate\Support\Facades\Route;
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

// Route::group(['prefix' => 'admin','middleware' => 'auth.admin'], function () {
// 	Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
// });
Route::get('/', function () {
	return view('client.home.index');
});