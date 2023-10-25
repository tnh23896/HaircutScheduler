<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TimeManagement\TimeController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RessetPasswordController;
use App\Http\Controllers\Admin\Bill\BillController;
use App\Http\Controllers\Admin\ScheduleManagement\ScheduleController;
use App\Http\Controllers\Admin\ScheduleManagement\ScheduleDetailsController;
use App\Http\Middleware\CheckPermissionAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeManagement\EmployeeController;
use App\Http\Controllers\Admin\ServiceManagement\CategoryController;
use App\Http\Controllers\Admin\WorkScheduleManagement\WorkScheduleController;
use App\Http\Controllers\Admin\BlogManagement\CategoryController as BlogCategoryController;
use App\Http\Controllers\Admin\BlogManagement\BlogController as BlogController;
use App\Http\Controllers\Admin\BannerManagement\BannerController;
use App\Http\Controllers\Admin\ScheduleEmployee\ScheduleEmployeeController;
use App\Http\Controllers\Admin\ServiceManagement\ServiceController;

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

// Login Admin
Route::get('login', [LoginController::class, 'showAdminLoginForm'])
    ->name('admin.login');
Route::post('login', [LoginController::class, 'adminLogin'])
    ->name('admin.auth.login');

// Route cho quên mật khẩu
Route::get('forget-password',
    [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.auth.ForgetPassword');
Route::post('forget-password',
    [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('admin.auth.ForgetPasswordPost');

// Route cho đặt lại mật khẩu
Route::get('reset-password/{token}/{email}',
    [ForgotPasswordController::class, 'ResetPassword'])->name('admin.auth.ResetPasswordGet');
Route::post('reset-password',
    [ForgotPasswordController::class, 'ResetPasswordStore'])->name('admin.auth.ResetPasswordPost');
// Route Reset Password
Route::post('reset-password',[RessetPasswordController::class,'resetPassword'])->name('admin.auth.ResetPasswordPost');


Route::get('404', function () {
    return view('admin.errors.404');
})->name('admin.404');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Logout
    Route::get('logout', [LoginController::class, 'logout'])
        ->name('admin.auth.logout');

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

    Route::name('admin.')->group(function () {
        //employee
        Route::resource('employee', EmployeeController::class);
        //workschedule
        Route::resource('work-schedule', WorkScheduleController::class);
        Route::post('work-schedule/{work_schedule}',
            [WorkScheduleController::class, 'update'])->name('work-schedule.update');
    });

    // Schedule Management
    Route::get('schedule-management', [ScheduleController::class, 'index'])
        ->name('admin.scheduleManagement.index');
    Route::get('schedule-management/edit/{id}', [ScheduleController::class, 'edit'])
        ->name('admin.scheduleManagement.edit');
    Route::post('schedule-management/edit/{id}', [ScheduleController::class, 'update'])
        ->name('admin.scheduleManagement.update');
    Route::get('schedule-management/{id}', [ScheduleController::class, 'show'])
        ->name('admin.scheduleManagement.show');
    // Schedule Details
    Route::get('schedule-details/{id}', [ScheduleDetailsController::class, 'edit'])
        ->name('admin.scheduleManagement.scheduleDetails');
    Route::put('schedule-details/{id}', [ScheduleDetailsController::class, 'update'])
        ->name('admin.scheduleManagement.scheduleDetails.update');
    Route::post('/schedule-details/{id}', [ScheduleDetailsController::class, 'store'])
        ->name('admin.scheduleManagement.scheduleDetails.store');


    //Bill
    Route::get('bill-management', [BillController::class, 'index'])
        ->name('admin.billManagement.index');

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

    //User
    Route::get('user', [UserController::class, 'index'])
        ->name('admin.UserManagement.index');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])
        ->name('admin.UserManagement.edit');
    Route::post('user/update/{id}', [UserController::class, 'update'])
        ->name('admin.UserManagement.update');

    // TIME
    Route::get('time', [TimeController::class, 'index'])
        ->name('admin.TimeManagement.index');
    Route::get('time/create', [TimeController::class, 'create'])
        ->name('admin.TimeManagement.create');
    Route::post('time/store', [TimeController::class, 'store'])
        ->name('admin.TimeManagement.store');
    Route::get('time/edit/{id}', [TimeController::class, 'edit'])
        ->name('admin.TimeManagement.edit');
    Route::post('time/update/{id}', [TimeController::class, 'update'])
        ->name('admin.TimeManagement.update');
    Route::delete('time/delete/{id}', [TimeController::class, 'destroy'])
        ->name('admin.TimeManagement.delete');

    //Category Blog
    Route::get('category-blog', [BlogCategoryController::class, 'index'])->name('admin.blogManagement.category.index');
    Route::get('category-blog/create',
        [BlogCategoryController::class, 'create'])->name('admin.blogManagement.category.create');
    Route::post('category-blog/create',
        [BlogCategoryController::class, 'store'])->name('admin.blogManagement.category.store');
    Route::get('category-blog/edit/{id}',
        [BlogCategoryController::class, 'edit'])->name('admin.blogManagement.category.edit');
    Route::post('category-blog/edit/{id}',
        [BlogCategoryController::class, 'update'])->name('admin.blogManagement.category.update');
    Route::delete('category-blog/delete/{id}',
        [BlogCategoryController::class, 'destroy'])->name('admin.blogManagement.category.delete');

    //Blog
    Route::get('blog', [BlogController::class, 'index'])->name('admin.blogManagement.blog.index');
    Route::get('blog/create', [BlogController::class, 'create'])->name('admin.blogManagement.blog.create');
    Route::post('blog/create', [BlogController::class, 'store'])->name('admin.blogManagement.blog.store');
    Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blogManagement.blog.edit');
    Route::post('blog/edit/{id}', [BlogController::class, 'update'])->name('admin.blogManagement.blog.update');
    Route::delete('blog/delete/{id}', [BlogController::class, 'destroy'])->name('admin.blogManagement.blog.delete');

    //ScheduleEmployee
    Route::get('schedule-employee', [ScheduleEmployeeController::class, 'index'])
        ->name('admin.ScheduleEmployee.index');

    //Role Management
    Route::get('role-management', [RoleController::class, 'index'])
        ->name('admin.RoleManagement.index');
    Route::get('role-management/create', [RoleController::class, 'create'])
        ->name('admin.RoleManagement.create');
    Route::post('role-management/create', [RoleController::class, 'store'])
        ->name('admin.RoleManagement.store');
    Route::get('role-management/edit/{id}', [RoleController::class, 'edit'])
        ->name('admin.RoleManagement.edit');
    Route::post('role-management/edit/{id}', [RoleController::class, 'update'])
        ->name('admin.RoleManagement.update');
    Route::delete('role-management/delete/{id}', [RoleController::class, 'destroy'])
        ->name('admin.RoleManagement.delete');

});
