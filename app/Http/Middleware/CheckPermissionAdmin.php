<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissionAdmin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		$excludedRoutes = [
			'admin.login',
			'admin.auth.login',
			'admin.auth.ForgetPassword',
			'admin.auth.ForgetPasswordPost',
			'admin.auth.ResetPasswordGet',
			'admin.auth.ResetPasswordPost',
			'admin.auth.ResetPasswordPost1',
			'admin.404',
			'admin.dashboard',
			'admin.auth.logout',
			'admin.profile.edit',
			'admin.profile.update',
			'admin.billManagement.search',
			'admin.scheduleManagement.search',
			'admin.serviceManagement.category.search',
			'admin.scheduleManagement.filter',
			'admin.serviceManagement.service.search',
			'admin.serviceManagement.service.filter',
			'admin.scheduleManagement.searchDateTime',
			'admin.billManagement.searchDateTime',
			'admin.PromotionManagement.filter',
			'admin.employee.search',
			'admin.UserManagement.search',
			'admin.UserManagement.filter',
			'admin.TimeManagement.search',
			'admin.blogManagement.category.search',
			'admin.blogManagement.blog.search',
			'admin.blogManagement.blog.filter',
			'admin.scheduleSetbyTime',
			'admin.serviceSetbyTime',
			'admin.revenueSetbyTime',
			'admin.topBooker',
			'admin.rating.search',
			'admin.rating.filter',
			'admin.topEmployee',
			'admin.billManagement.printBill',
			'admin.schedulebyTime',
			'admin.revenueSetTime',
			'admin.serviceSetTime',
			'admin.topEmployees',
			'admin.ScheduleEmployee.search',
			'admin.revenue.export',
			'admin.schedulestatics.export',

		];

		$name = Route::currentRouteName();
		foreach ($excludedRoutes as $value) {
			if ($name === $value) {
				return $next($request);
			}
		}
		if (!Auth::guard('admin')->check()) {
			return redirect()->route('admin.login');
		}
		/** @var \App\Models\Admin $admin * */
		$admin = Auth::guard('admin')->user();
		if ($admin->hasPermissionTo($name)) {
			return $next($request);
		}

		return redirect()->back()->with('error', 'Bạn không có quyền truy cập !');
	}
}
