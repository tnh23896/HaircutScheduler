<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\CategoryBlog;
use Illuminate\Support\ServiceProvider;

class LayoutClientProvider extends ServiceProvider
{
	/**
	 * Register services.
	 */
	public function register(): void
	{
		//
	}

	/**
	 * Bootstrap services.
	 */
	public function boot(): void
	{
		//
		view()->composer('*', function ($view) {
			$category_blog = CategoryBlog::all();
			$activeBanners = Banner::where('status', 'active')->first();
			$view->with('category_blog', $category_blog);
			$view->with('activeBanners', $activeBanners);
		});
	}
}
