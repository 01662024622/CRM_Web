<?php

namespace App\Providers;

use App\Services\ApartmentService;
use App\Services\FeedbackService;
use App\Services\Impl\ApartmentServiceImpl;
use App\Services\Impl\FeedbackServiceImpl;
use App\Services\Impl\ReportMarketServiceImpl;
use App\Services\Impl\ReviewServiceImpl;
use App\Services\Impl\UserServiceImpl;
use App\Services\ReportMarketService;
use App\Services\ReviewService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
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
            ReportMarketService::class,
            ReportMarketServiceImpl::class
        );
        $this->app->singleton(
            ReviewService::class,
            ReviewServiceImpl::class
        );
        $this->app->singleton(
            FeedbackService::class,
            FeedbackServiceImpl::class
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
