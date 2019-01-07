<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
