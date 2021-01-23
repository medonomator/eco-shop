<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;   
use App\View\Components\Alert;
use App\Models\ShoppingCart;
use App\Repositories\CategoryRepository;

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
        view()->composer('*', function ($view) {
            if(auth('web')->user()) {
                $shopCartsCount = ShoppingCart::where('client_id', auth('web')->user()->id)->count();
                View::share('shopCartsCount', $shopCartsCount);
            }
        });
       
        // \DB::listen(function ($query) {
        //     dump($query->sql);
        //     // dump($query->bindings);
        // });
        $this->app->bind('CategoryRepository', function($app)
        {
            return new CategoryRepository();
        });
    }
}
