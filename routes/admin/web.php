<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Bill\BillController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Rating\RatingController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\RessetPasswordController;
use App\Http\Controllers\Admin\TimeManagement\TimeController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use App\Http\Controllers\Admin\BannerManagement\BannerController;
use App\Http\Controllers\Admin\ServiceManagement\ServiceController;
use App\Http\Controllers\Admin\ServiceManagement\CategoryController;
use App\Http\Controllers\Admin\EmployeeManagement\EmployeeController;
use App\Http\Controllers\Admin\ScheduleManagement\ScheduleController;
use App\Http\Controllers\Admin\PromotionManagement\PromotionController;
use App\Http\Controllers\Admin\ScheduleEmployee\ScheduleEmployeeController;
use App\Http\Controllers\Admin\ScheduleManagement\ScheduleDetailsController;
use App\Http\Controllers\Admin\WorkScheduleManagement\WorkScheduleController;
use App\Http\Controllers\Admin\BlogManagement\BlogController as BlogController;
use App\Http\Controllers\Admin\BlogManagement\CategoryController as BlogCategoryController;
use App\Http\Controllers\Admin\Statistical\EmployeeAndCustomerStatisticsController;
use App\Http\Controllers\Admin\Statistical\RevenueStatisticsController;
use App\Http\Controllers\Admin\Statistical\ScheduleStatisticsController;
use App\Http\Controllers\Admin\Statistical\ServiceUsageStatisticsController;
use App\Http\Controllers\Admin\Statistical\timeStatisticsController;
use App\Http\Controllers\Admin\WelcomeController;

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
Route::get(
    'forget-password',
    [ForgotPasswordController::class, 'showLinkRequestForm']
)->name('admin.auth.ForgetPassword');
Route::post(
    'forget-password',
    [ForgotPasswordController::class, 'ForgetPasswordStore']
)->name('admin.auth.ForgetPasswordPost');

// Route cho đặt lại mật khẩu
Route::get('reset-password/{token}/{email}',
    [ForgotPasswordController::class, 'ResetPassword'])->name('admin.auth.ResetPasswordGet');
Route::post('reset-password-store',
    [ForgotPasswordController::class, 'ResetPasswordStore'])->name('admin.auth.ResetPasswordPost');
// Route Reset Password
Route::post('reset-password',[RessetPasswordController::class,'resetPassword'])->name('admin.auth.ResetPasswordPost1');


Route::get('404', function () {
    return view('admin.errors.404');
})->name('admin.404');

Route::group(['middleware' => 'admin'], function () {
    // Route::get('/', function(){
    //      return view('admin.welcome');
    //     })->name('admin.welcome');
    Route::get('/', [WelcomeController::class, 'index'])->name('admin.welcome');
		// Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

		// Thống kê dịch vụ
    Route::post('/service-set-by-time', [DashboardController::class, 'serviceSetByTime'])
        ->name('admin.serviceSetbyTime');

		// Thống kê nhân viên
    Route::post('/top-employee', [DashboardController::class, 'topEmployee'])
        ->name('admin.topEmployee');

    // Logout
    Route::get('logout', [LoginController::class, 'logout'])
        ->name('admin.auth.logout');

		// Rating
		Route::get('rating', [RatingController::class, 'index'])->name('admin.rating.index');
		Route::get('rating/search', [RatingController::class, 'search'])->name('admin.rating.search');
		Route::delete('rating/delete/{id}', [RatingController::class, 'destroy'])->name('admin.rating.delete');
		Route::get('filter-rating', [RatingController::class, 'filter'])
		->name('admin.rating.filter');

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
    Route::get('search-category-service', [CategoryController::class, 'search'])
        ->name('admin.serviceManagement.category.search');

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
    Route::get('search-service', [ServiceController::class, 'search'])
        ->name('admin.serviceManagement.service.search');
    Route::get('filter-category-service', [ServiceController::class, 'filter'])
        ->name('admin.serviceManagement.service.filter');

    Route::name('admin.')->group(function () {
        //employee
        Route::resource('employee', EmployeeController::class);
        //search
        Route::get('search-employee', [EmployeeController::class, 'search'])
            ->name('employee.search');
        //workschedule
        Route::resource('work-schedule', WorkScheduleController::class);
        Route::post(
            'work-schedule/{work_schedule}',
            [WorkScheduleController::class, 'update']
        )->name('work-schedule.update1');
    });
    // Schedule Management
    Route::get('schedule-management', [ScheduleController::class, 'index'])
        ->name('admin.scheduleManagement.index');
    Route::get('schedule-management/edit/{id}', [ScheduleController::class, 'edit'])
        ->name('admin.scheduleManagement.edit');
    Route::post('schedule-management/edit/{id}', [ScheduleController::class, 'update'])
        ->name('admin.scheduleManagement.update');
    Route::post('schedule-management/updateStatus/{id}', [ScheduleController::class, 'updateStatus'])
        ->name('admin.scheduleManagement.updateStatus');
    Route::post('schedule-management/getStaff', [ScheduleController::class, 'getStaff'])->name('admin.scheduleManagement.getStaff');
    // Route::get('schedule-management/{id}', [ScheduleController::class, 'show'])
    //     ->name('admin.scheduleManagement.show');
    Route::get('schedule-management/create', [ScheduleController::class, 'create'])
        ->name('admin.scheduleManagement.create');
    Route::post('schedule-management/store', [ScheduleController::class, 'store'])->name('admin.scheduleManagement.store');

    Route::get('search-schedule', [ScheduleController::class, 'search'])
        ->name('admin.scheduleManagement.search');
    Route::get('filter-schedule', [ScheduleController::class, 'filter'])
        ->name('admin.scheduleManagement.filter');
    Route::get('search-datetime-schedule', [ScheduleController::class, 'searchByDateandTime'])
        ->name('admin.scheduleManagement.searchDateTime');
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
    Route::get('search-bill', [BillController::class, 'search'])
        ->name('admin.billManagement.search');
    Route::get('search-datetime-bill', [BillController::class, 'searchByDateandTime'])
        ->name('admin.billManagement.searchDateTime');
    Route::get('print-bill/{id}', [BillController::class, 'printBill'])
        ->name('admin.billManagement.printBill');



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
    Route::post('user/update/{id}', [UserController::class, 'update'])
        ->name('admin.UserManagement.update');
    Route::get('search-user', [UserController::class, 'search'])
        ->name('admin.UserManagement.search');
    Route::get('filter-user', [UserController::class, 'filter'])
        ->name('admin.UserManagement.filter');

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
    Route::get('search-time', [TimeController::class, 'search'])
        ->name('admin.TimeManagement.search');

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
    Route::get('category-blog/search', [BlogCategoryController::class, 'search'])
        ->name('admin.blogManagement.category.search');

    //Blog
    Route::get('blog', [BlogController::class, 'index'])->name('admin.blogManagement.blog.index');
    Route::get('blog/create', [BlogController::class, 'create'])->name('admin.blogManagement.blog.create');
    Route::post('blog/create', [BlogController::class, 'store'])->name('admin.blogManagement.blog.store');
    Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blogManagement.blog.edit');
    Route::post('blog/edit/{id}', [BlogController::class, 'update'])->name('admin.blogManagement.blog.update');
    Route::delete('blog/delete/{id}', [BlogController::class, 'destroy'])->name('admin.blogManagement.blog.delete');
    Route::get('blog/search', [BlogController::class, 'search'])->name('admin.blogManagement.blog.search');
    Route::get('blog/filter', [BlogController::class, 'filter'])->name('admin.blogManagement.blog.filter');

    //ScheduleEmployee
    Route::get('employee-schedule', [ScheduleEmployeeController::class, 'index'])->name('admin.ScheduleEmployee.index');
    Route::post('employee-schedule/store', [ScheduleEmployeeController::class, 'store'])->name('admin.ScheduleEmployee.store');
    Route::post('employee-schedule', [ScheduleEmployeeController::class, 'search'])->name('admin.ScheduleEmployee.search');
    Route::post('schedule-employee/{id}', [ScheduleEmployeeController::class, 'update'])->name('admin.ScheduleEmployee.update');
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

    //Profile
    Route::get('/profile', [ProfileController::class,'edit'])->name('admin.profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');

    //Promotion Management
    Route::get('promotion-management', [PromotionController::class, 'index'])
        ->name('admin.PromotionManagement.index');
    Route::get('promotion-management/create', [PromotionController::class, 'create'])
        ->name('admin.PromotionManagement.create');
    Route::post('promotion-management/create', [PromotionController::class, 'store'])
        ->name('admin.PromotionManagement.store');
    Route::get('promotion-management/edit/{id}', [PromotionController::class, 'edit'])
        ->name('admin.PromotionManagement.edit');
    Route::post('promotion-management/edit/{id}', [PromotionController::class, 'update'])
        ->name('admin.PromotionManagement.update');
    Route::delete('promotion-management/delete/{id}', [PromotionController::class, 'destroy'])
        ->name('admin.PromotionManagement.delete');
    Route::get('promotion-management/filter', [PromotionController::class, 'filter'])
        ->name('admin.PromotionManagement.filter');


		//export excel
		Route::post('revenue-statistics-export',[RevenueStatisticsController::class, 'export'])->name('admin.revenue.export');
    //Statistical
    Route::get('schedule-statistics', [ScheduleStatisticsController::class, 'index'])
        ->name('admin.Statistical.scheduleStatistics');
    Route::post('/schedule-by-time', [ScheduleStatisticsController::class, 'search'])
        ->name('admin.schedulebyTime');
    Route::get('revenue-statistics', [RevenueStatisticsController::class, 'index'])
        ->name('admin.Statistical.revenueStatistics');
    Route::post('/revenue-set-time', [RevenueStatisticsController::class, 'revenueSetbyTime'])
        ->name('admin.revenueSetTime');
    Route::get('service-usage-statistics', [ServiceUsageStatisticsController::class, 'index'])
        ->name('admin.Statistical.serviceUsageStatistics');
    Route::post('/service-set-time', [ServiceUsageStatisticsController::class, 'serviceSetByTime'])
        ->name('admin.serviceSetTime');
    Route::get('employee-and-customer-statistics', [EmployeeAndCustomerStatisticsController::class, 'index'])
        ->name('admin.Statistical.employeeAndCustomerStatistics');
    Route::post('/top-booker', [EmployeeAndCustomerStatisticsController::class, 'topBooker'])
        ->name('admin.topBooker');
    Route::post('/top-employees', [EmployeeAndCustomerStatisticsController::class, 'topEmployee'])
        ->name('admin.topEmployees');

});