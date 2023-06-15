<?php

namespace App\Providers;

use App\Models\Pix;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use App\Observers\BaseObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(BaseObserver::class);
        Product::observe(BaseObserver::class);
        Sale::observe(BaseObserver::class);
        Pix::observe(BaseObserver::class);
    }
}
