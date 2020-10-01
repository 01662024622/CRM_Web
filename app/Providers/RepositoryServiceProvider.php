<?php

namespace App\Providers;

use App\Services\CustomerFeedbackService;
use App\Services\FeedbackPRService;
use App\Services\FeedbackService;
use App\Services\FeedbackWarehouseService;
use App\Services\Impl\CustomerFeedbackServiceImpl;
use App\Services\Impl\FeedbackPRServiceImpl;
use App\Services\Impl\FeedbackServiceImpl;
use App\Services\Impl\FeedbackWarehouseServiceImpl;
use App\Services\Impl\ReportMarketServiceImpl;
use App\Services\Impl\ReviewServiceImpl;
use App\Services\ReportMarketService;
use App\Services\ReviewService;
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
        $this->app->singleton(
            CustomerFeedbackService::class,
            CustomerFeedbackServiceImpl::class
        );
        $this->app->singleton(
            FeedbackWarehouseService::class,
            FeedbackWarehouseServiceImpl::class
        );
        $this->app->singleton(
            FeedbackPRService::class,
            FeedbackPRServiceImpl::class
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
