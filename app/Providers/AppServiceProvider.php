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


        view()->composer('frontend.includes.header', function($view)
        {

            $view->with('catgs',\App\Catg::catgs());

        });


        view()->composer('backend.includes.sidebar-menu', function($view)
        {

            $view->with('categories',\App\Catg::categories());

        });


        view()->composer('backend.includes.sidebar-menu', function($view)
        {

            $view->with('albums',\App\Album::albums());

        });
        
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
