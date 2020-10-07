<?php

namespace App\Providers;

use App\Apartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view)
        {
            if (Auth::check()){
            $apartment_user = Apartment::select('id')->where('status',0)->where('user_id',\Auth::id())->get()->pluck('id')->toArray();
            $view->with('apartment_user', $apartment_user);
            }
        });
    }
}
