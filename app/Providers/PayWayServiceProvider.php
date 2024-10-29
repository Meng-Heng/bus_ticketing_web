<?php

namespace App\Providers;

use App\Services\PayWayService;
use Illuminate\Support\ServiceProvider;

class PayWayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PayWayService::class, function ($app) {
            return new PayWayService;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

}
