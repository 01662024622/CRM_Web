<?php

namespace App\Providers;

use App\Services\ApartmentService;
use App\Services\CategoryService;
use App\Services\Impl\ApartmentServiceImpl;
use App\Services\Impl\CategoryServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AdminRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ApartmentService::class,
            ApartmentServiceImpl::class
        );
        $this->app->singleton(
            UserService::class,
            UserServiceImpl::class
        );
        $this->app->singleton(
            CategoryService::class,
            CategoryServiceImpl::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
