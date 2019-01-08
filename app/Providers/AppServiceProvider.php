<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->helpers();
        $this->viewShare();
    }

    /**
     * [helpers description]
     * @return helpers.php
     */
    public function helpers(){

        foreach (glob(__DIR__.'/../Helpers/*.php') as $file) {
            require_once $file;
        }
    }
    public function viewShare(){
        View::share('categories', Category::withCount('posts')->get());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
