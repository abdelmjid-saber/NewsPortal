<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Language;
use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {    

        $categories = Category::where('show_on_menu', 'Show')->get();
        $page_data = Page::where('id', 1)->first();
        $popular_posts_data = Post::orderBy('visitors', 'desc')->get();
        $setting_data = Setting::where('id', 1)->first();
        
        view()->share('global_categories', $categories);
        view()->share('global_page_data', $page_data);
        view()->share('global_popular_posts_data', $popular_posts_data);
        view()->share('global_setting_data', $setting_data);
    }
}
